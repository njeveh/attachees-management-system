import './bootstrap';
import './scripts';
import Alpine from 'alpinejs';
import actionScripts from './actionScripts';

window.Alpine = Alpine;
Alpine.data('actionScripts', actionScripts);
Alpine.start();