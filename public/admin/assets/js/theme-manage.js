let themeMode=localStorage.getItem('themeMode');
let skin=localStorage.getItem('skinColor');
// console.log(skin);

skin= skin==null?"theme-blush":"theme-"+skin;

let body=document.getElementsByTagName('body')[0];

body.classList.add(skin);
body.classList.add(themeMode);
