(()=>{function e(){window.innerWidth<1200&&(document.querySelectorAll(".menu-item.has-sub").forEach((e=>{e.querySelector(".menu-link").addEventListener("click",(t=>{t.preventDefault(),e.querySelector(".submenu").classList.toggle("active")}))})),document.querySelectorAll(".submenu-item.has-sub").forEach((e=>{e.querySelector(".submenu-link").addEventListener("click",(t=>{t.preventDefault(),e.querySelector(".subsubmenu").classList.toggle("active")}))}))),window.innerWidth>1200&&(document.querySelector(".main-navbar").style.display="")}document.querySelector(".burger-btn").addEventListener("click",(e=>{e.preventDefault(),document.querySelector(".main-navbar").classList.toggle("active")})),window.onload=()=>e(),window.addEventListener("resize",(t=>{e()}))})();