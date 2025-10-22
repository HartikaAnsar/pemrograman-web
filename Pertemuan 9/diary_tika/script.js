// Theme Toggle
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = themeToggle.querySelector('i');
    
    // Check for saved theme or prefer color scheme
    const savedTheme = localStorage.getItem('theme') || 'light';
    setTheme(savedTheme);
    
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        setTheme(newTheme);
        localStorage.setItem('theme', newTheme);
    });
    
    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        
        if (theme === 'dark') {
            themeIcon.className = 'fas fa-sun';
            document.body.style.background = 'linear-gradient(135deg, #0f172a 0%, #1e293b 100%)';
        } else {
            themeIcon.className = 'fas fa-moon';
            document.body.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        }
    }
});

// Search Functionality
function setupSearch() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const noteCards = document.querySelectorAll('.note-card');
            
            noteCards.forEach(card => {
                const title = card.querySelector('.note-title').textContent.toLowerCase();
                const content = card.querySelector('.note-content').textContent.toLowerCase();
                const category = card.querySelector('.note-category').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || content.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
}

// Toggle Favorite
function toggleFavorite(noteId) {
    window.location.href = `index.php?action=toggleFavorite&id=${noteId}`;
}

// Auto-resize textarea
function autoResizeTextarea() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Trigger initial resize
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    });
}

// Character counter for textarea
function setupCharacterCounter() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        const counter = document.createElement('div');
        counter.className = 'text-muted small mt-1 character-counter';
        textarea.parentNode.appendChild(counter);
        
        function updateCounter() {
            const count = textarea.value.length;
            counter.textContent = `${count} karakter`;
            
            if (count > 1000) {
                counter.className = 'text-warning small mt-1 character-counter';
            } else {
                counter.className = 'text-muted small mt-1 character-counter';
            }
        }
        
        textarea.addEventListener('input', updateCounter);
        updateCounter(); // Initial count
    });
}

// Initialize all features when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    setupSearch();
    autoResizeTextarea();
    setupCharacterCounter();
    
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Add loading animation to buttons
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
            this.disabled = true;
            
            // Reset after 3 seconds if still disabled (fallback)
            setTimeout(() => {
                if (this.disabled) {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }
            }, 3000);
        });
    });
});

// Confirmation for delete actions
function confirmDelete(message = 'Yakin ingin menghapus?') {
    return confirm(message);
}

// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'alert alert-success position-fixed top-0 end-0 m-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = '<i class="fas fa-check me-2"></i>Berhasil disalin!';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.remove();
        }, 2000);
    });
}