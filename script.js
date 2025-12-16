document.addEventListener('DOMContentLoaded', () => {

    // --- Theme Toggle ---
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;
    const icon = themeToggle ? themeToggle.querySelector('i') : null;
    const logoImg = document.querySelector('.logo img'); // Header logo
    const footerLogoImg = document.querySelector('.footer-logo img'); // Footer logo

    // Function to update logo
    function updateLogo(theme) {
        const src = theme === 'light' ? 'img/logo.png' : 'img/logo-white.png';

        if (logoImg) logoImg.src = src;
        if (footerLogoImg) footerLogoImg.src = src;
    }

    // Check local storage or system preference
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;

    if (savedTheme === 'light' || (!savedTheme && systemPrefersLight)) {
        html.setAttribute('data-theme', 'light');
        if (icon) {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
        updateLogo('light');
    } else {
        updateLogo('dark');
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            updateLogo(newTheme);

            if (icon) {
                if (newTheme === 'light') {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                } else {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                }
            }
        });
    }

    // --- Mobile Menu ---
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');

    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const icon = hamburger.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    // --- Header Scroll ---
    const header = document.getElementById('header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // --- Animations ---
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const animatedElements = document.querySelectorAll('.fade-in-up');
    animatedElements.forEach(el => observer.observe(el));

    // --- Form Handling ---
    const form = document.getElementById('auditionForm');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerText;

            btn.innerText = 'Submitting...';
            btn.style.opacity = '0.7';

            setTimeout(() => {
                alert('Application Submitted Successfully! We will contact you soon.');
                form.reset();
                btn.innerText = originalText;
                btn.style.opacity = '1';
            }, 1500);
        });
    }

    // --- Cart Logic ---
    updateCartCount();

});

// Simple Cart System
function addToCart(name, price) {
    let cart = JSON.parse(localStorage.getItem('reignCart')) || [];

    // Check if item exists
    const existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.qty += 1;
    } else {
        cart.push({ name, price, qty: 1 });
    }

    localStorage.setItem('reignCart', JSON.stringify(cart));
    updateCartCount();
    alert(`Added "${name}" to cart!`);
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('reignCart')) || [];
    const count = cart.reduce((acc, item) => acc + item.qty, 0);
    const cartCountEl = document.getElementById('cartCount');
    if (cartCountEl) {
        cartCountEl.innerText = count;
    }
}

function renderCartPage() {
    const cart = JSON.parse(localStorage.getItem('reignCart')) || [];
    const tbody = document.getElementById('cartTableBody');
    const emptyMsg = document.getElementById('emptyCartMsg');
    const cartContent = document.getElementById('cartContent');
    const subtotalEl = document.getElementById('cartSubtotal');
    const totalEl = document.getElementById('cartTotal');

    if (!tbody) return;

    if (cart.length === 0) {
        cartContent.style.display = 'none';
        emptyMsg.style.display = 'block';
        return;
    }

    cartContent.style.display = 'block';
    emptyMsg.style.display = 'none';

    tbody.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 50px; height: 50px; background: #333;"></div>
                    <span>${item.name}</span>
                </div>
            </td>
            <td>KES ${item.price.toLocaleString()}</td>
            <td><input type="number" value="${item.qty}" min="1" style="width: 50px; text-align: center; background: #000; border: 1px solid #333; color: #fff;" onchange="updateCartQty(${index}, this.value)"></td>
            <td>KES ${itemTotal.toLocaleString()}</td>
            <td><i class="fas fa-trash text-gold" style="cursor: pointer;" onclick="removeFromCart(${index})"></i></td>
        `;
        tbody.appendChild(tr);
    });

    subtotalEl.innerText = `KES ${total.toLocaleString()}`;
    totalEl.innerText = `KES ${total.toLocaleString()}`;
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem('reignCart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('reignCart', JSON.stringify(cart));
    renderCartPage();
    updateCartCount();
}

function updateCartQty(index, newQty) {
    let cart = JSON.parse(localStorage.getItem('reignCart')) || [];
    if (newQty < 1) return;
    cart[index].qty = parseInt(newQty);
    localStorage.setItem('reignCart', JSON.stringify(cart));
    renderCartPage();
    updateCartCount();
}
