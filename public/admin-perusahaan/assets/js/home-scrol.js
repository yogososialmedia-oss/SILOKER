document.addEventListener('DOMContentLoaded', function () {
    const menuLinks = document.querySelectorAll('.menu-beranda .nav-link');
    const sections = document.querySelectorAll('section');
    const offset = 70; // tinggi navbar

    // ===== Smooth scroll untuk #section =====
    menuLinks.forEach(link => {
        const href = link.getAttribute('href');
        if(href.startsWith('#')){
            link.addEventListener('click', function(e){
                e.preventDefault();
                const targetId = href.substring(1);
                const targetSection = document.getElementById(targetId);
                if(targetSection){
                    window.scrollTo({
                        top: targetSection.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            });
        }
    });

    // ===== Scrollspy untuk Home/About =====
    if(sections.length){
        window.addEventListener('scroll', function(){
            let scrollPos = window.scrollY + offset + 1;
            sections.forEach(section => {
                const top = section.offsetTop;
                const bottom = top + section.offsetHeight;
                const id = section.getAttribute('id');
                if(scrollPos >= top && scrollPos < bottom){
                    menuLinks.forEach(link => link.classList.remove('active'));
                    const activeLink = document.querySelector(`.menu-beranda a[href$="#${id}"]`);
                    if(activeLink) activeLink.classList.add('active');
                }
            });
        });
    }

    // ===== Highlight menu berdasarkan URL path =====
    const currentPath = window.location.pathname.replace(/\/$/,""); // hapus trailing slash
    menuLinks.forEach(link => {
        const href = link.getAttribute('href');
        if(!href.startsWith('#')){
            const linkPath = new URL(href, window.location.origin).pathname.replace(/\/$/,"");
            if(linkPath === currentPath){
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        }
    });
});
