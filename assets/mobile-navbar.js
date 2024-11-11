// --------- Mobile Navbar Class ---------
class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";
        this.handleClick = this.handleClick.bind(this);
        this.handleOutsideClick = this.handleOutsideClick.bind(this);
    }

    animateLinks() {
        this.navLinks.forEach((link, index) => {
            link.style.animation
                ? (link.style.animation = "")
                : (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`);
        });
    }

    handleClick() {
        this.navList.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animateLinks();
    }

    handleOutsideClick(event) {
        // Verifica se o clique foi fora do menu
        if (!this.mobileMenu.contains(event.target) && this.navList.classList.contains(this.activeClass)) {
            this.navList.classList.remove(this.activeClass);
            this.mobileMenu.classList.remove(this.activeClass);
            this.animateLinks(); // Para reiniciar a animação
        }
    }

    addClickEvent() {
        this.mobileMenu.addEventListener("click", this.handleClick);
        document.addEventListener("click", this.handleOutsideClick); // Adiciona o evento de clique no documento
    }

    init() {
        if (this.mobileMenu) {
            this.addClickEvent();
        }
        return this;
    }
}

const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
);

mobileNavbar.init();

// --------- Calendar and Form Functions ---------
function setServiceType(service) {
    document.getElementById('serviceTypeInput').value = service;
    document.getElementById('reservationForm').style.display = 'block';
}

function setDateTime() {
    const now = new Date();
    const formattedDateTime = now.toISOString(); // Formato ISO 8601 (YYYY-MM-DDTHH:MM:SSZ)
    document.getElementById('selectedDateTime').value = formattedDateTime;
}

function closeForm() {
    document.getElementById('reservationForm').style.display = 'none';
}

