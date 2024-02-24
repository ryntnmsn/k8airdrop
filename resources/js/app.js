import { initFlowbite } from 'flowbite';
import './bootstrap';
import 'flowbite';
import {Tab, initTE,} from "tw-elements";
import '@glidejs/glide/dist/css/glide.core.css'
import '@glidejs/glide/dist/css/glide.theme.css'
initTE({ Tab });


document.addEventListener('livewire:navigated', () => {
    initFlowbite();
});
