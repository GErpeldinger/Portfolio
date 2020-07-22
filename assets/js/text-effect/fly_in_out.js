const targets = document.getElementsByClassName('name');

function textEffect(element, animationName) {
    let text = element.innerHTML,
        chars = text.length,
        newText = '',
        animation = animationName,
        char,
        i;

    for (i = 0; i < chars; i += 1) {
        newText += '<i>' + text.charAt(i) + '</i>';
    }

    element.innerHTML = newText;

    let wrappedChars = document.getElementsByTagName('i'),
        wrappedCharsLen = wrappedChars.length,
        j = 0;

    function addEffect () {
        setTimeout(() => {
            wrappedChars[j].className = animation;
            j += 1;
            if (j < wrappedCharsLen) {
                addEffect();
            }
        }, 100)
    }

    addEffect();
};

for (let i = 0; i < targets.length; i += 1) {
    textEffect(targets[i], 'fly-in-out');
}
