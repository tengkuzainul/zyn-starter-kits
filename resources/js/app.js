import "./bootstrap";

// Navbar Alpine.js Component
window.navbar = function () {
    return {
        isScrolled: false,
        isMobileMenuOpen: false,
        hoveredItem: null,
        navItems: [{ name: "About Developer", link: "#about" }],
        init() {
            // Listen for scroll events
            window.addEventListener("scroll", () => {
                this.isScrolled = window.scrollY > 100;
            });
        },
    };
};

// Typewriter Effect Alpine.js Component
window.typewriter = function () {
    return {
        words: [
            { text: "Build" },
            { text: "awesome" },
            { text: "apps" },
            { text: "with" },
            {
                text: "Zyn Starter.",
                className: "text-blue-600 dark:text-blue-400",
            },
        ],
        currentCharIndex: 0,
        totalChars: 0,
        isDeleting: false,
        currentWordIndex: 0,
        typeSpeed: 100,
        deleteSpeed: 50,
        pauseAfterComplete: 5000, // Jeda 5 detik setelah selesai mengetik semua
        init() {
            // Calculate total characters
            this.totalChars = this.words.reduce(
                (total, word) => total + word.text.length,
                0
            );

            // Start typewriter effect
            this.startTypewriter();
        },
        getCharPosition(wordIndex, charIndex) {
            let position = 0;
            for (let i = 0; i < wordIndex; i++) {
                position += this.words[i].text.length;
            }
            return position + charIndex;
        },
        startTypewriter() {
            this.typewriterLoop();
        },
        typewriterLoop() {
            const currentWord = this.words[this.currentWordIndex];
            const targetChars = this.getCharPosition(
                this.currentWordIndex,
                currentWord.text.length
            );

            if (!this.isDeleting) {
                // Typing phase
                if (this.currentCharIndex < targetChars) {
                    this.currentCharIndex++;
                    setTimeout(() => this.typewriterLoop(), this.typeSpeed);
                } else {
                    // Word completed, check if we're done with all words
                    if (this.currentWordIndex < this.words.length - 1) {
                        // Move to next word immediately (no pause)
                        this.currentWordIndex++;
                        setTimeout(() => this.typewriterLoop(), this.typeSpeed);
                    } else {
                        // All words typed, pause 5 seconds then start deleting
                        setTimeout(() => {
                            this.isDeleting = true;
                            this.typewriterLoop();
                        }, this.pauseAfterComplete);
                    }
                }
            } else {
                // Deleting phase
                if (this.currentCharIndex > 0) {
                    this.currentCharIndex--;
                    setTimeout(() => this.typewriterLoop(), this.deleteSpeed);
                } else {
                    // All text deleted, reset and restart immediately
                    this.isDeleting = false;
                    this.currentWordIndex = 0;
                    // Start typing again immediately (no pause)
                    setTimeout(() => this.typewriterLoop(), this.typeSpeed);
                }
            }
        },
    };
};

// Footer Animation Alpine.js Component
window.footerAnimation = function () {
    return {
        isVisible: false,
        init() {
            // Create intersection observer for footer animation
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            this.isVisible = true;
                        }
                    });
                },
                {
                    threshold: 0.1,
                    rootMargin: "0px 0px -50px 0px",
                }
            );

            // Observe footer content
            if (this.$refs.footerContent) {
                observer.observe(this.$refs.footerContent);
            }
        },
    };
};
