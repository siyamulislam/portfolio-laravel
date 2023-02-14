let themeMode=localStorage.getItem('themeMode');
let skin=localStorage.getItem('skinColor');
skin= skin==null?'theme-blush':'theme-'+skin;
let body=document.getElementsByTagName('body')[0];
console.log(skin);

body.classList.add(themeMode);
body.classList.add(skin);
