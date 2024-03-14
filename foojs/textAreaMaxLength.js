function checkTextAreaMaxLength(textBox, e, length) {
    var mLen = textBox["MaxLength"];
    if (null == mLen)
        mLen = length;
    var maxLength = parseInt(mLen);
    if (!checkSpecialKeys(e)) {
        if (textBox.value.length > maxLength - 1) {
            textBox.value = textBox.value.substring(0, textBox.value.length-2);
            if (window.event)//IE
                e.returnValue = false;
            else//Firefox
                e.preventDefault();
        }
    }
    else
        e.returnValue = false;
}
function checkSpecialKeys(e) {
    if (e.keyCode != 222)
        return false;
    else
        return true;
}

function BlockTypingSpecialCharacters(textBox, e) {
    if (e.keyCode == 222) {
        e.returnValue = false;
        e.preventDefault();
    }
}
