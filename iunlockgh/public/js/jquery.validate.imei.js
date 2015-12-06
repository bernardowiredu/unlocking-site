jQuery.validator.addMethod(
    "imei",
    function(value, element)
    {
        var numbers = value.split('');
        var sum_string = '', sum = 0;
        for(i = 0; i < numbers.length; i++)
        {
            sum_string += numbers[i] * (i % 2 == 0 ? 1 : 2);
        }

        numbers = sum_string.split('');
        for(i = 0; i < numbers.length; i++)
        {
            sum += parseInt(numbers[i]);
        }
        var check = sum % 10 == 0;

        return this.optional(element) || check;
    },
    "Invalid IMEI number"
);






$('input,textarea').click(function () {
    $(this).select();
});



function isIMEI (s) {
    var etal = /^[0-9]{15}$/;
    if (!etal.test(s))
        return false;
    sum = 0; mul = 2; l = 14;
    for (i = 0; i < l; i++) {
        digit = s.substring(l-i-1,l-i);
        tp = parseInt(digit,10)*mul;
        if (tp >= 10)
            sum += (tp % 10) +1;
        else
            sum += tp;
        if (mul == 1)
            mul++;
        else
            mul--;
    }
    chk = ((10 - (sum % 10)) % 10);
    if (chk != parseInt(s.substring(14,15),10))
        return false;
    return true;
}



