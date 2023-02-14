let themeMode=localStorage.getItem('themeMode');
let skin=localStorage.getItem('skinColor');
let rtlMode=localStorage.getItem('rtlMode');
// let msMode=localStorage.getItem('msMode');

skin= skin==null?"theme-blush":"theme-"+skin;

let body=document.getElementsByTagName('body')[0];

if(skin)body.classList.add(skin);
if(themeMode)body.classList.add(themeMode);
if(rtlMode)body.classList.add(rtlMode);
// if(msMode)body.classList.add(msMode);

