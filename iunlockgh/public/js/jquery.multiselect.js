/*
 *  Project: Multiselect
 *  Description: An alternative and responsive multiselect widget
 *  URL:
 *  Author: Danier Rivas
 *  License: MIT
 */
;
(function ($, window, document, undefined) {

    // undefined is used here as the undefined global variable in ECMAScript 3 is
    // mutable (ie. it can be changed by someone else). undefined isn't really being
    // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
    // can no longer be modified.

    // window and document are passed through as local variable rather than global
    // as this (slightly) quickens the resolution process and can be more efficiently
    // minified (especially when both are regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = "multiselect",
        defaults = {
            addScrollBar: true,
            addSearchBox: true,
            addActionBox: true,
            animateSearch: true, // Can be 'normal', 'slow', 'fast', or int number
            searchBoxText: 'Type here to search list...',
            checkAllText: 'Check all',
            uncheckAllText: 'Uncheck all',
            invertSelectText: 'Invert select',
            showCheckboxes: true,
            showSelectedItems: false,
            overwriteName: false, // Use false when you need to use original name attribute, or use
                                  // true if you want to overwrite original name attribute with id; Very
                                  // important for Ruby on Rails support to use original name attribute!
            submitDataAsArray: true, // This one allows compatibility with languages that use arrays
                                     // to process the form data, such as PHP. Set to false if using
                                     // ColdFusion or anything else with a list-based approach.
            preferIdOverName: true,  // When this is true (default) the ID of the select box is
                                     // submitted to the server as the variable containing the checked
                                     // items. Set to false to use the "name" attribute instead (this makes
                                     // it compatible with Drupal's Views module and Ruby on Rails.)
            maxNumOfSelections: -1,  // If you want to limit the number of items a user can select in a
                                     // checklist, set this to a positive integer.

            // This function gets executed whenever you go over the max number of allowable selections.
            onMaxNumExceeded: function () {
                alert('You cannot select more than ' + this.maxNumOfSelections + ' items in this list.');
            },

            initSelection: $.noop(),

            // In case of name conflicts, you can change the class names to whatever you want to use.
            cssContainer: 'checklistContainer',
            cssChecklist: 'checklist',
            cssChecklistHighlighted: 'checklistHighlighted',
            cssLeaveRoomForCheckbox: 'leaveRoomForCheckbox', // For label elements
            cssEven: 'even',
            cssOdd: 'odd',
            cssChecked: 'checked',
            cssDisabled: 'disabled',
            cssShowSelectedItems: 'showSelectedItems',
            cssFocused: 'focused', // This cssFocused is for the li's in the checklist
            cssFindInList: 'findInList',
            cssBlurred: 'blurred', // This cssBlurred is for the findInList divs.
            cssContainsPlaceholder: 'contains-placeholder', // This cssBlurred is for the findInList divs.
            cssOptgroup: 'optgroup',

            listWidth: 0,    // force the list width, if 0 the original SELECT width is used
            itemWidth: 0     // 0   : each item will be large as the list (single column)
                             // > 0 : each item will have a fixed size, so we could split
                             //       list into more than one column
                             // WARNING: vertical scroll bar width must be taken into account
                             // listWidth=200, itemWidth=50 DOES NOT GIVE a 4 columns list
                             // if list scroll bar is visible
        };

    // The actual plugin constructor
    function Plugin(element, options) {
        this.element = element;
        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {
        init: function () {
            // Place initialization logic here
            // You already have access to the DOM element and
            // the options via the instance, e.g. this.element
            // and this.settings
            // you can add more functions like the one below and
            // call them like so: this.updateChecklist(this.element, this.settings).

            var self = this,
                o = this.settings,
                el = $(this.element);

            var overflowProperty = ( o.addScrollBar ) ? 'overflow-y: auto; overflow-x: hidden;' : '',
                leaveRoomForCheckbox = ( o.showCheckboxes ) ? 'padding-left: 25px' : 'padding-left: 3px';

            // Here, THIS refers to the jQuery stack object that contains all the target elements that
            // are going to be converted to checklists. Let's loop over them and do the conversion.
            $.each(el, function () {

                var numOfCheckedBoxesSoFar = 0;

                // Hang on to the important information about this <select> element.
                var jSelectElem = $(this);
                var jSelectElemId = jSelectElem.attr('id');
                var jSelectElemName = jSelectElem.attr('name');
                if (jSelectElemId == '' || !o.preferIdOverName) {
                    // Regardless of whether this is a PHP environment, we need an id
                    // for the element, and it shouldn't have brackets [] in it.
                    jSelectElemId = jSelectElemName.replace(/\[|\]/g, '');
                    if (jSelectElemId == '') {
                        self.error('Can\'t convert element to checklist.\nYour SELECT element must'
                            + ' have a "name" attribute and/or an "id" attribute specified.');
                        return $;
                    }
                }

                var h = jSelectElem.outerHeight();
                /* : '100%'; */
                var w = o.listWidth ? o.listWidth : jSelectElem.outerWidth();
                // We have to account for the extra thick left border.
                w -= 2;

                // Make sure it's a SELECT element, and that it's a multiple one.
                if (this.type != 'select-multiple' && this.type != 'select-one') {
                    self.error("Can't convert element to checklist.\n"
                        + "Expecting SELECT element with \"multiple\" attribute.");
                    return $;
                } else if (this.type == 'select-one') {
                    return $;
                }

                var convertListItemsToCheckboxes = function () {
                    var checkboxValue = $(this).val();
                    // The option tag may not have had a "value" attribute set. In this case,
                    // Firefox automatically uses the innerHTML instead, but we need to set it
                    // manually for IE.
                    if (checkboxValue == '') {
                        checkboxValue = $(this).html();
                    }
                    checkboxValue = checkboxValue.replace(/ /g, '_');

                    var checkboxId = jSelectElemId + '_' + checkboxValue;
                    // escape bad values for checkboxId
                    checkboxId = checkboxId.replace(/[^A-Z0-9]+/ig, "_"); //.replace(/(\.|\/|\,|\%|\<|\>|\=)/g, '\\$1');

                    var labelText = $(this).html();
                    var selected = '';
                    if ($(this).attr('disabled')) {
                        var disabled = ' disabled="disabled"';
                        var disabledClass = ' class="disabled"';
                    } else {
                        var disabled = '';
                        var disabledClass = '';
                        var selected = '';
                        if ($(this).attr('selected')) {
                            if (o.maxNumOfSelections != -1 && numOfCheckedBoxesSoFar <= o.maxNumOfSelections) {
                                selected += 'checked="checked"';
                                numOfCheckedBoxesSoFar++;
                            } else if (o.maxNumOfSelections == -1) {
                                selected += 'checked="checked"';
                            }
                        }
                    }

                    var arrayBrackets = (o.submitDataAsArray) ? '[]' : '';
                    var checkboxName = (o.preferIdOverName) ? jSelectElemId + arrayBrackets : jSelectElemName + arrayBrackets;
                    // avoid trailing double [][]
                    checkboxName = checkboxName.replace(/\[\]\[\]$/, '[]');

                    $(this).replaceWith('<li tabindex="0"><input type="checkbox" value="' + checkboxValue
                        + '" name="' + checkboxName + '" id="' + checkboxId + '" ' + selected + disabled
                        + ' /><label for="' + checkboxId + '"' + disabledClass + '>' + labelText + '</label></li>');
                    // Hide the checkboxes.
                    if (o.showCheckboxes === false) {
                        // We could use display:none here, but IE can't handle it. Better
                        // to hide the checkboxes off screen to the left.
                        $('#' + checkboxId).css('position', 'absolute').css('left', '-50000px');
                    } else {
                        $('label[for=' + checkboxId + ']').addClass(o.cssLeaveRoomForCheckbox);
                    }
                };

                // Loop through optgroup elements (if any) and turn them into headings
                $('optgroup', jSelectElem).each(function (i) {
                    $('option', this).each(convertListItemsToCheckboxes);
                    $(this).replaceWith(
                        '<li class="' + o.cssOptgroup + '">'
                        + '<input type="checkbox" class="' + o.cssOptgroup + '" id="' + jSelectElemId + '_' + o.cssOptgroup + '_' + i + '">'
                        + '<label for="' + jSelectElemId + '_' + o.cssOptgroup + '_' + i + '" class="leaveRoomForCheckbox">' + $(this).attr('label') + '</label>'
                        + '</li>' + $(this).html()
                    );
                });

                // Loop through all remaining options (not in optgroups) and convert them to li's
                // with checkboxes and labels.
                $('option', jSelectElem).each(convertListItemsToCheckboxes);

                // If the first list item in the checklist is an optgroup label, we want
                // to remove the top border so it doesn't look ugly.
                $('li:first', jSelectElem).each(function () {
                    if ($(this).hasClass(o.cssOptgroup)) {
                        $(this).css('border-top', 'none');
                    }
                });


                var checklistId = jSelectElemId + '_' + 'checklist';

                // Convert the outer SELECT elem to a <div>
                // Also, enclose it inside another div that has the original id, so developers
                // can access it as before. Also, this allows the search box to be inside
                // the div as well.
                jSelectElem.replaceWith('<div id="' + jSelectElemId + '" class="' + o.cssContainer + '"><div id="' + checklistId + '">'
                    + '<ul>' + jSelectElem.html() + '</ul></div></div>');
                var checklistDivId = '#' + checklistId;

                // We're going to create a custom HTML attribute in the main div box (the one
                // that contains the checklist) to store our value for the showSelectedItems
                // setting. This is necessary because we may need to change this value dynamically
                // after the initial conversion in order to make it faster to check/uncheck every
                // item in the list.
                $('#' + jSelectElemId).attr('showSelectedItems', o.showSelectedItems.toString());

                $('#' + jSelectElemId).css('width', w + 2);

                // We MUST set the checklist div's position to either 'relative' or 'absolute'
                // (default is 'static'), or else Firefox will think the offsetParent of the inner
                // elements is BODY instead of DIV.
                $(checklistDivId).css('position', 'relative');

                // Add the findInList div, if settings call for it.
                var findInListDivHeight = 0;
                if (o.addSearchBox) {
                    self.addSearchBox(jSelectElem, checklistDivId, w, o);
                }

                if (o.addActionBox) {
                    self.addActionBox(jSelectElem, checklistDivId, w, o);
                }

                // Bind optgroup inputs
                $('li.' + o.cssOptgroup, checklistDivId).on('click', 'input', function (e) {
                    var index = parseInt(this.id.replace(jSelectElemId + '_' + o.cssOptgroup + '_', '')),
                        nextElement = $('li.' + o.cssOptgroup + ':eq(' + (index + 1) + ')', checklistDivId),
                        selector = $('li.' + o.cssOptgroup + ':eq(' + index + ')', checklistDivId).nextUntil(nextElement);

                    self.updateChecklist((this.checked ? 'checkAllGroup' : 'clearAllGroup'), checklistDivId, selector);
                });

                // Add styles
                var items = $('li', checklistDivId);

                $(checklistDivId).addClass(o.cssChecklist);
                if (o.addScrollBar) {
                    $(checklistDivId).height(h - findInListDivHeight).width(w);
                } else {
                    $(checklistDivId).height('100%').width(w);
                }
                $('ul', checklistDivId).addClass(o.cssChecklist);

                // Stripe the li's
                $('li:even', checklistDivId).addClass(o.cssEven);
                $('li:odd', checklistDivId).addClass(o.cssOdd);

                // Emulate the :hover effect for keyboard navigation.
                items.focus(function () {
                    $(this).addClass(o.cssFocused);
                }).blur(function (event) {
                    $(this).removeClass(o.cssFocused);
                });

                // Multicolumn items
                // make items float:left if itemWidth option is set
                if (o.itemWidth > 0) {
                    var colW = o.itemWidth + 'px';
                    items.each(function () {
                        $(this).css({
                            'float': 'left',
                            'width': colW
                        });
                    });
                }

                // Highlight preselected ones.
                items.each(function () {
                    if ($('input', this).attr('checked')) {
                        $(this).addClass(o.cssChecked);
                    }
                });

                // EVENT HANDLERS

                var toggleDivGlow = function () {
                    // Make sure the div is glowing if something is checked in it.
                    if (items.hasClass(o.cssChecked)) {
                        $(checklistDivId).addClass(o.cssChecklistHighlighted);
                    } else {
                        $(checklistDivId).removeClass(o.cssChecklistHighlighted);
                    }
                };

                var moveToNextLi = function () {
                    // Make sure that the next LI has a checkbox (some LIs don't, because
                    // they came from <optgroup> tags.
                    if ($(this).prop('tagName').toLowerCase() != 'li') {
                        return;
                    }
                    if ($(this).is('li:has(input)')) {
                        $(this).focus();
                    }
                    else {
                        $(this).next().each(moveToNextLi);
                    }
                };

                // Check/uncheck boxes
                var check = function (event) {

                    // This needs to be keyboard accessible too. Only check the box if the user
                    // presses space (enter typically submits a form, so is not safe).
                    if (event.type == 'keydown') {
                        // Pressing spacebar in IE and Opera triggers a Page Down. We don't want that
                        // to happen in this case. Opera doesn't respond to this, unfortunately...
                        // We also want to prevent form submission with enter key.
                        if (event.keyCode == 32 || event.keyCode == 13) {
                            event.preventDefault();
                        }
                        // Tab keys need to move to the next item in IE, Opera, Safari, Chrome, etc.
                        if (event.keyCode == 9 && !event.shiftKey) {
                            event.preventDefault();
                            // Move to the next LI
                            $(this).off('keydown.tabBack').blur().next().each(moveToNextLi);
                        } else if (event.keyCode == 9 && event.shiftKey) {
                            // Move to the previous LI
                            //$(this).prev(':has(input)').focus();
                        }

                        if (event.keyCode != 32) {
                            return;
                        }
                    }


                    // If we go over the maxNumOfSelections limit, trigger our custom
                    // event onMaxNumExceeded.
                    var numOfItemsChecked = $('input:checked', checklistDivId).length;
                    if (o.maxNumOfSelections != -1 && numOfItemsChecked > o.maxNumOfSelections
                        && !$('input', this).attr('checked')) {

                        o.onMaxNumExceeded();

                        event.preventDefault();
                        return;
                    }

                    // Not sure if unbind() here removes default action, but that's what I want.
                    $('label', this).off();
                    // Make sure that the event handler isn't triggered twice (thus preventing the user
                    // from actually checking the box) if clicking directly on checkbox or label.
                    // Note: the && is not a mistake here. It should not be ||
                    if (event.target.tagName.toLowerCase() != 'input' && event.target.tagName.toLowerCase() != 'label') {
                        $('input', this).trigger('click');
                    }

                    // Change the styling of the row to be checked or unchecked.
                    var checkbox = $('input', this).get(0);
                    updateLIStyleToMatchCheckedStatus(checkbox);

                    // The showSelectedItems setting can change after the initial conversion to
                    // a checklist, so rather than checking o.showSelectedItems, we check the
                    // value of the custom HTML attribute on the main containing div.
                    if ($('#' + jSelectElemId).attr('showSelectedItems') === 'true') {
                        showSelectedItems();
                    }
                };

                var updateLIStyleToMatchCheckedStatus = function (checkbox) {
                    if (checkbox.checked) {
                        $(checkbox).parent().addClass(o.cssChecked);
                    } else {
                        $(checkbox).parent().removeClass(o.cssChecked);
                    }
                    toggleDivGlow();
                };

                // Accessibility, primarily for IE
                var handFocusToLI = function () {
                    // Make sure that labels and checkboxes that receive
                    // focus divert the focus to the LI itself.
                    $(this).parent().focus();
                };

                $('li:has(input)', checklistDivId).click(check).keydown(check);
                $('label', checklistDivId).focus(handFocusToLI);
                $('input', checklistDivId).focus(handFocusToLI);
                toggleDivGlow();

                // Make sure that resetting the form doesn't leave highlighted divs where
                // they shouldn't be and vice versa.
                var fixFormElems = function (event) {
                    $('input', this).each(function () {
                        this.checked = this.defaultChecked;
                        updateLIStyleToMatchCheckedStatus(this);
                        if (o.showSelectedItems) {
                            showSelectedItems();
                        }
                    }).parent();
                };

                $('form:has(div.' + o.cssChecklist + ')').on('reset.fixFormElems', fixFormElems);

                // List the selected items in a UL
                var selectedItemsListId = '#' + jSelectElemId + '_selectedItems';
                if (o.showSelectedItems) {
                    $(selectedItemsListId).addClass(o.cssShowSelectedItems);
                }

                var showSelectedItems = function () {
                    // Clear the innerHTML of the list and then add every item to it
                    // that is highlighted in the checklist.
                    $(selectedItemsListId).html('');
                    $('label', checklistDivId).each(function () {
                        var vcontext = $(this).parent();
                        if ($(this).parent().hasClass(o.cssChecked)) {
                            var labelText = jQuery.trim($(this).html());
                            $('<li class="">' + labelText + '</li>')
                                .on('click.remove', function () {
                                    vcontext.trigger('click');
                                }).appendTo(selectedItemsListId);
                        }
                    });
                };

                // We have to run showSelectedItems() once here too, upon initial conversion.
                if (o.showSelectedItems) {
                    showSelectedItems();
                }
            });

        },

        // Since o can be a string instead of an object, we need a function that
        // will handle the action requested when o is a string (e.g. 'clearAll')
        updateChecklist: function (action, checklistElem, selector) {

            // Before we operate on all checkboxes, we need to make sure that
            // showSelectedItems is disabled, at least temporarily. Otherwise,
            // this process will be REALLY slow because it tries to update the
            // DOM a thousand times unnecessarily.
            // (We will only do this if the list is greater than 3 items.)

            var showSelectedItemsSetting;

            var disableDynamicList = function (checklistLength) {
                if (checklistLength > 3) {
                    showSelectedItemsSetting = $(checklistElem).attr('showSelectedItems');
                    $(checklistElem).attr('showSelectedItems', 'false');
                }
            };

            var enableDynamicList = function () {
                $(checklistElem).attr('showSelectedItems', showSelectedItemsSetting);
            };

            switch (action) {

                case 'clearAll' :
                    var selector = 'li:has(input:checked:not(:hidden))';
                    break;

                case 'checkAll' :
                    var selector = 'li:has(input:not(:checked,:disabled,:hidden))';
                    break;

                case 'invert' :
                    var selector = 'li:has(input:not(:hidden))';
                    break;

                case 'checkAllGroup' :
                    var selector = selector.find(':input:not(:checked,:disabled,:hidden)');
                    break;

                case 'clearAllGroup' :
                    var selector = selector.find(':input:checked:not(:hidden)');
                    break;

                default :
                    alert("multiselect Plugin says:\n\nWarning - Invalid action requested on checklist.\nThe action requested was: " + action);
                    break;
            }

            var checklistLength = $(selector, checklistElem).length;
            disableDynamicList(checklistLength);
            // If it's checked, force the click event handler to run.
            $(selector, checklistElem).each(function (i) {
                // Before we check/uncheck the penultimate item in the list, we need to restore
                // the showSelectedItems setting to its original setting, so that we update the
                // list of selected items appropriately on the last item we check/uncheck.
                if (i == checklistLength - 2 && checklistLength > 3) {
                    enableDynamicList();
                }

                if (!$(this).hasClass('optgroup')) {
                    $(this).trigger('click');
                } else {
                    var input = $(this).find(':input');
                    input.prop('checked', !input[0].checked);
                }
            });
        },

        error: function (msg) {
            alert("jQuery Plugin Error (Plugin: multiselect)\n\n" + msg);
        },

        addSearchBox: function (jSelectElem, checklistDivId, w, o) {

            // Poorly named function... It's really onFocusSearchBox.
            var focusSearchBox = function () {
                // Remove placeholder text when focusing search box if it contains placeholder.
                if ($(this).hasClass(o.cssContainsPlaceholder)) {
                    $(this).val('');
                }

                $(this).removeClass(o.cssBlurred);
            };

            var showAllSelectOptions = function () {
                $('label', checklistDivId).each(function () {
                    if (o.animateSearch !== false)
                        $(this).parent('li').slideDown(o.animateSearch);
                    else
                        $(this).parent('li').show();
                });
            };

            var blurSearchBox = function () {
                // Restore default text on blur.
                if ($(this).val() === '') {
                    $(this).val(o.searchBoxText);
                    $(this).addClass(o.cssContainsPlaceholder);
                    var t = setTimeout(showAllSelectOptions, 250);
                }

                $(this).addClass(o.cssBlurred);
            };

            var initSearchBox = function () {

                $(checklistDivId).before('<div class="findInList" id="' + jSelectElem.attr('id') + '_findInListDiv">'
                    + '<input type="text" value="' + o.searchBoxText + '" id="'
                    + jSelectElem.attr('id') + '_findInList" class="' + o.cssBlurred + ' ' + o.cssContainsPlaceholder + '" /></div>');

                // Set width of searchbox input to same as original SELECT element.
                w -= 4;
                $('#' + jSelectElem.attr('id') + '_findInList').css('width', w);

                var searchBoxId = '#' + jSelectElem.attr('id') + '_findInList';

                // We want to be able to simply press tab to move the focus from the
                // search text box to the item in the list that we found with it.
                $(searchBoxId)
                    .on('keydown.tabToFocus', function (event) {
                        if (event.keyCode == 9) {
                            // event.preventDefault(); // No double tabs, please...
                            $('label:first:visible', checklistDivId).parent().on('keydown.tabBack', function (event) {
                                // This function lets you shift-tab to get back to the search box easily.
                                if (event.keyCode == 9 && event.shiftKey) {
                                    event.preventDefault(); // No double tabs, please...
                                    $(searchBoxId)
                                        //.off('focus.focusSearchBox')
                                        //.removeClass(o.cssBlurred)
                                        //.on('focus.focusSearchBox',focusSearchBox)
                                        //  .on('blur.blurSearchBox',blurSearchBox)
                                        .focus();
                                    $(this).off('keydown.tabBack');
                                }
                            }).focus(); // Focuses the actual list item found by the search box
                            // $(this).off('keydown.tabToFocus');

                        } else {
                            //$(this).off('blur.blurSearchBox');
                        }
                    })
                    .on('focus.focusSearchBox', focusSearchBox) // Set up keydown and keyup event handlers, etc. on searchbox
                    .on('blur.blurSearchBox', blurSearchBox)
                    .on('keyup', function (event) {
                        // Search for the actual text.
                        var textbox = this; // holder
                        if ($(this).val() === '') {
                            showAllSelectOptions();
                            //$(this).off('keydown.tabToFocus');
                            return false;
                        }
                        else {
                            // Remove placeholder on user input.
                            $(this).removeClass(o.cssContainsPlaceholder);
                        }

                        $('label', checklistDivId).each(function () {
                            var $curLabel = $(this);
                            if (!$curLabel.is(':disabled')) {
                                var curItem = $curLabel.text().toLowerCase();
                                var typedText = textbox.value.toLowerCase();

                                if (curItem.indexOf(typedText) == -1) {
                                    if (o.animateSearch !== false)
                                        $curLabel.parent('li').slideUp(o.animateSearch);
                                    else
                                        $curLabel.parent('li').hide();
                                } else {
                                    if (o.animateSearch !== false)
                                        $curLabel.parent('li').slideDown(o.animateSearch);
                                    else
                                        $curLabel.parent('li').show();
                                }
                            }


                        });

                        return;

                    });

                // Compensate for the extra space the search box takes up by shortening the
                // height of the checklist div. Also account for margin below the search box.
                findInListDivHeight = $('#' + jSelectElem.attr('id') + '_findInListDiv').height() + 3;
            };

            initSearchBox();
        },

        addActionBox: function (jSelectElem, checklistDivId, w, o) {
            var self = this;

            var initActionBox = function () {

                $(checklistDivId).after('<div class="actionButtons" id="' + jSelectElem.attr('id') + '_actionButtons">'
                    + '<span data-action="checkAll" >' + o.checkAllText + '</span> | '
                    + '<span data-action="clearAll" >' + o.uncheckAllText + '</span> | '
                    + '<span data-action="invert" >' + o.invertSelectText + '</span></div>'
                );

                var actionBoxId = '#' + jSelectElem.attr('id') + '_actionButtons';

                $(actionBoxId).on('click', 'span', function () {
                    var action = $(this).data("action");
                    self.updateChecklist(action, checklistDivId);
                });
            };

            initActionBox();
        }
    });

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        // chain jQuery functions
        return this;
    };

})(jQuery, window, document);
