let fromText = document.querySelector('.fromText')
    toText = document.querySelector('.toText')
    exchange = document.querySelector('.exchange')
    fromLang = document.querySelector('.fromLang')
    toLang = document.querySelector('.toLang');

fromText.onchange  = function (){
    let text = fromText.value.trim();
    if(!text) return;
    let apiUrl = `https://api.mymemory.translated.net/get?q=${text}&langpair=de|ru`;
    fetch(apiUrl).then(res => res.json()).then(data => {
        toText.value = data.responseData.translatedText;
        data.matches.forEach(data => {
            if(data.id === 0) {
                toText.value = data.translation;
            }
        });
    });
}
exchange.addEventListener('click', () =>{
    let tempText = fromText.value;
    tempLang = fromLang.textContent;
    fromText.value = toText.value;
    fromLang.textContent = toLang.textContent;
    toText.value = tempText;
    toLang.textContent = tempLang;
});