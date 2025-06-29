document.addEventListener('DOMContentLoaded', () => {
    const heroImageSection = document.getElementById('heroImageSection');
    const heroText = document.getElementById('heroText');
    const ctaButton = document.querySelector('.cta-button');
    const aboutSection = document.getElementById('aboutSection');
    const aboutImagePlaceholder = document.querySelector('.about-image-placeholder');

    // Intersection Observer for about section
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate hero image to left and scale up
                heroImageSection.classList.add('fixed-animate');
                heroText.classList.add('hidden');
                ctaButton.classList.add('hidden');
                aboutImagePlaceholder.classList.add('visible');
            } else {
                // Restore hero image to center
                heroImageSection.classList.remove('fixed-animate');
                heroText.classList.remove('hidden');
                ctaButton.classList.remove('hidden');
                aboutImagePlaceholder.classList.remove('visible');
            }
        });
    }, { threshold: 0.2 });

    observer.observe(aboutSection);

    document.querySelectorAll('.navbar-nav a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default jump to anchor

            const targetId = this.getAttribute('href'); // Get the href (e.g., "#about-section")
            const targetElement = document.querySelector(targetId); // Find the element by ID

            if (targetElement) {
                // Calculate scroll position, accounting for fixed navbar height
                const navbarHeight = document.querySelector('.navbar').offsetHeight; // Get dynamic navbar height
                const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - navbarHeight - 20; // -20 for a little extra padding from navbar

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth" // Enable smooth scrolling
                });
            }
        });
    });

    const workDetailModal = document.getElementById('workDetailModal');
    if (workDetailModal) { // Check if the modal element exists on the page
        workDetailModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget;

            // Extract info from data-bs-* attributes
            const workTitle = button.getAttribute('data-work-title');
            const workStartDate = button.getAttribute('data-work-start-date');
            const workEndDate = button.getAttribute('data-work-end-date');
            const workDescription = button.getAttribute('data-work-description');
            const workImageUrl = button.getAttribute('data-work-image-url');
            const workImageAlt = button.getAttribute('data-work-image-alt');
            const workSkills = button.getAttribute('data-work-skills'); // This is a string now

            // Update the modal's content
            const modalTitle = workDetailModal.querySelector('#modalWorkTitle');
            const modalTimeline = workDetailModal.querySelector('#modalWorkTimeline');
            const modalDescription = workDetailModal.querySelector('#modalWorkDescription');
            const modalImage = workDetailModal.querySelector('#modalWorkImage');
            const modalSkills = workDetailModal.querySelector('#modalWorkSkills');

            modalTitle.textContent = workTitle;
            modalDescription.textContent = workDescription;
            modalImage.src = workImageUrl;
            modalImage.alt = workImageAlt;

            // Handle timeline display (combine start and end date)
            if (workStartDate !== 'N/A' && workEndDate !== 'N/A') {
                modalTimeline.textContent = `${workStartDate} - ${workEndDate}`;
            } else if (workStartDate !== 'N/A') {
                modalTimeline.textContent = workStartDate;
            } else {
                modalTimeline.textContent = ''; // Or empty or just "N/A"
            }

            // Display skills
            if (workSkills) {
                modalSkills.textContent = workSkills;
            } else {
                modalSkills.textContent = 'No skills listed.';
            }

            // If you have a "View Project" link in the modal footer:
            // const modalViewProjectLink = workDetailModal.querySelector('#modalViewProjectLink');
            // if (modalViewProjectLink) {
            //     modalViewProjectLink.href = `/works/${button.getAttribute('data-work-id')}`; // Example URL
            // }

            
        });
    }

    
});


