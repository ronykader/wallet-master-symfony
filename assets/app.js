/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'

import JSConfetti from 'js-confetti';
const jsConfetti = new JSConfetti();
jsConfetti.addConfetti();

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉')
