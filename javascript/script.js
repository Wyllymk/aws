/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', () => {
	const plans = document.querySelectorAll('.plan-item'); // Select all plans
	const hero = document.querySelector('.hero'); // Select the hero section
	const sports = document.querySelector('.sports'); // Select the sports section
	const evaluationLeft = document.querySelector('.evaluation-left'); // Select the evaluation left section
	const evaluationRight = document.querySelector('.evaluation-right'); // Select the evaluation right section
	const faq = document.querySelector('.faq'); // Select the faq section
	const image = document.querySelector('.image'); // Select the faq section

	// Animation for plans
	gsap.from(plans, {
		opacity: 0,
		y: 50, // Move up from 50px
		duration: 1,
		stagger: 0.4, // Delay between animations
		ease: 'power3.out',
		scrollTrigger: {
			trigger: plans[0], // Trigger animation when the first plan appears
			start: 'top 80%', // Start when 80% of the section is in view
			toggleActions: 'play none none none',
		},
	});

	// Animation for hero
	gsap.from(hero, {
		opacity: 0, // Fade in from transparent
		duration: 2, // Animation duration of 2 seconds
		ease: 'power3.out', // Smooth easing
	});

	// Animation for sports
	gsap.from(sports, {
		opacity: 0, // Fade in from transparent
		y: 50, // Move up from 50px
		duration: 2, // Animation duration of 2 seconds
		ease: 'power3.out', // Smooth easing
		scrollTrigger: {
			trigger: sports, // Trigger animation when the sports section appears
			start: 'top 80%', // Start when 80% of the section is in view
			toggleActions: 'play none none none',
		},
	});

	// Animation for evaluationRight
	gsap.from(evaluationRight, {
		opacity: 0, // Fade in from transparent
		x: 50, // Move in from 50px to the right
		duration: 2, // Animation duration of 2 seconds
		ease: 'power3.out', // Smooth easing
		scrollTrigger: {
			trigger: evaluationRight, // Trigger animation when the evaluationRight section appears
			start: 'top 80%', // Start when 80% of the section is in view
			toggleActions: 'play none none none',
		},
	});

	// Animation for evaluationLeft
	gsap.from(evaluationLeft, {
		opacity: 0, // Fade in from transparent
		x: -50, // Move in from 50px to the left
		duration: 2, // Animation duration of 2 seconds
		ease: 'power3.out', // Smooth easing
		scrollTrigger: {
			trigger: evaluationLeft, // Trigger animation when the evaluationLeft section appears
			start: 'top 80%', // Start when 80% of the section is in view
			toggleActions: 'play none none none',
		},
	});
	gsap.from(faq, {
		rotationX: 90, // Flip on the X-axis
		opacity: 0,
		duration: 1.5,
		ease: 'power3.out',
		scrollTrigger: {
			trigger: '.card',
			start: 'top 80%',
			toggleActions: 'play none none none',
		},
	});
	gsap.from(image, {
		filter: 'blur(10px)', // Start with a blur effect
		opacity: 0,
		duration: 2,
		ease: 'power2.out',
		scrollTrigger: {
			trigger: '.image',
			start: 'top 80%',
			toggleActions: 'play none none none',
		},
	});
});

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
	const menuButton = document.querySelector('#menuButton');
	const menuLinks = document.querySelectorAll('.menu-link'); // Mobile menu links
	const navLinks = document.querySelectorAll('.nav-link'); // Desktop navigation links
	const navMenu = document.querySelector('#navMenu');
	const overlay = document.getElementById('overlay');

	const sections = document.querySelectorAll('section'); // All sections
	const linkMap = {}; // Map section IDs to links

	// Toggle menu on button click
	menuButton.addEventListener('click', function () {
		navMenu.classList.toggle('-translate-x-full');
		navMenu.classList.toggle('opacity-0');
		navMenu.classList.toggle('opacity-100');
		navMenu.classList.toggle('pointer-events-none');
		overlay.classList.toggle('hidden');
	});

	// Close menu and overlay on outside click
	overlay.addEventListener('click', function () {
		closeMenu();
	});

	// Close menu on mobile menu link click
	menuLinks.forEach((link) => {
		link.addEventListener('click', function () {
			closeMenu();
		});
	});

	// Function to close menu
	function closeMenu() {
		navMenu.classList.add('-translate-x-full');
		navMenu.classList.add('opacity-0');
		navMenu.classList.add('pointer-events-none');
		overlay.classList.add('hidden');
	}

	// Map sections to their links
	[...menuLinks, ...navLinks].forEach((link) => {
		const sectionId = link
			.getAttribute('href')
			.replace('#', '')
			.toLowerCase();
		if (!linkMap[sectionId]) linkMap[sectionId] = [];
		linkMap[sectionId].push(link);
	});

	const observerOptions = {
		root: null,
		rootMargin: '0px 0px -100px 0px',
		threshold: [0.1, 0.5, 0.9],
	};

	const observer = new IntersectionObserver(function (entries) {
		entries.forEach((entry) => {
			const sectionId = entry.target.id.toLowerCase();
			const links = linkMap[sectionId];

			if (entry.isIntersecting) {
				// Add active classes
				links?.forEach((link) => {
					if (link.closest('.menu-link')) {
						// Mobile menu link
						link.classList.add('bg-mustard-gold', 'text-white');
					} else if (link.classList.contains('nav-link')) {
						// Desktop nav link
						link.classList.add('text-gray-900');
						link.classList.remove('text-black');

						// Also underline the span inside the nav link
						const underlineSpan = link.querySelector('span');
						if (underlineSpan) {
							underlineSpan.classList.add('scale-x-100');
						}
					}
				});
			} else {
				// Remove active classes
				links?.forEach((link) => {
					if (link.closest('.menu-link')) {
						// Mobile menu link
						link.classList.remove('bg-mustard-gold', 'text-white');
					} else if (link.classList.contains('nav-link')) {
						// Desktop nav link
						link.classList.remove('text-gray-900');
						link.classList.add('text-black');

						// Remove underline effect
						const underlineSpan = link.querySelector('span');
						if (underlineSpan) {
							underlineSpan.classList.remove('scale-x-100');
						}
					}
				});
			}
		});
	}, observerOptions);

	// Observe all sections
	sections.forEach((section) => observer.observe(section));
});

function smoothScrollTo(targetId) {
	const target = document.getElementById(targetId);
	if (!target) return;

	const header = document.querySelector('header'); // Replace 'header' with your header's selector
	const offset = header ? header.offsetHeight : 0;
	const startPosition = window.pageYOffset;
	const targetPosition =
		target.getBoundingClientRect().top + startPosition - offset;
	const distance = targetPosition - startPosition;
	const duration = 1000; // Duration of the scroll in milliseconds
	let startTime = null;

	function animation(currentTime) {
		if (startTime === null) startTime = currentTime;
		const timeElapsed = currentTime - startTime;
		const run = easeInOutQuad(
			timeElapsed,
			startPosition,
			distance,
			duration
		);
		window.scrollTo(0, run);
		if (timeElapsed < duration) requestAnimationFrame(animation);
	}

	// Easing function for smooth start and end
	function easeInOutQuad(t, b, c, d) {
		t /= d / 2;
		if (t < 1) return (c / 2) * t * t + b;
		t--;
		return (-c / 2) * (t * (t - 2) - 1) + b;
	}

	requestAnimationFrame(animation);
}

// Attach smooth scroll to buttons or links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
	anchor.addEventListener('click', function (e) {
		e.preventDefault();
		const targetId = this.getAttribute('href').substring(1);
		smoothScrollTo(targetId);
	});
});

function animateHeader() {
	gsap.from('.page-header', {
		opacity: 0,
		y: -30,
		duration: 1,
		ease: 'power3.out',
	});
}

function animateResults() {
	gsap.from('.group', {
		opacity: 0,
		y: 30,
		duration: 0.8,
		stagger: 0.2,
		ease: 'power3.out',
	});
}

function animateNoResults() {
	gsap.from('#main > div', {
		opacity: 0,
		y: 30,
		duration: 1,
		ease: 'power3.out',
	});
}

function animateEntryHeader() {
	gsap.from('.entry-header', {
		opacity: 0,
		y: -30,
		duration: 1,
		ease: 'power3.out',
	});
}

function animateBlogPosts() {
	gsap.from('.home-post-card', {
		opacity: 0,
		y: 30,
		duration: 0.8,
		stagger: 0.2,
		ease: 'power3.out',
	});
}

function animateBlogPagination() {
	gsap.from('#home-pagination', {
		opacity: 0,
		y: 20,
		duration: 0.8,
		ease: 'power3.out',
		delay: 0.5,
	});
}

function animateNoPosts() {
	gsap.from('#home-no-posts', {
		opacity: 0,
		y: 30,
		duration: 1,
		ease: 'power3.out',
	});
}
function featuredArticles() {
	return {
		initAnimations() {
			const posts = this.$el.querySelectorAll('.group');
			gsap.fromTo(
				posts,
				{
					y: 50,
				},
				{
					y: 0,
					duration: 0.8,
					stagger: 0.2,
					ease: 'power3.out',
				}
			);
		},
	};
}

// Add hover effect for thumbnails without using group
document.querySelectorAll('.home-post-card').forEach((card) => {
	const thumbnail = card.querySelector('.home-post-card__thumbnail');
	if (thumbnail) {
		card.addEventListener('mouseenter', () =>
			gsap.to(thumbnail, {
				scale: 1.05,
				duration: 0.3,
			})
		);
		card.addEventListener('mouseleave', () =>
			gsap.to(thumbnail, {
				scale: 1,
				duration: 0.3,
			})
		);
	}
});
