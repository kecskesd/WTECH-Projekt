window.onscroll = function() {
    if (this.oldScroll > this.scrollY)
        document.getElementById('brands').style.height = '25px';
    if (this.oldScroll < this.scrollY)
        document.getElementById('brands').style.height = '0px';
    this.oldScroll = this.scrollY;
};

window.onload = function() {
    let i;
    let acc = document.getElementsByClassName('filter-name');
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                this.firstElementChild.classList.remove('up');
            } else {
                panel.style.maxHeight = panel.scrollHeight + 'px';
                this.firstElementChild.classList.add('up');
            }
        });
    }

    let w1 = document.getElementById('login-window');
    let w2 = document.getElementById('pay-window');
    let w3 = document.getElementById('mobile-window');
    window.onclick = function(event) {
        if (event.target === w1)
            w1.style.display = 'none';
        if (event.target === w2)
            w2.style.display = 'none';
        if (event.target === w3) {
            w3.style.display = 'none';
            document.getElementById("mobile-nav").style.width = "0";
        }
    };
};
