import { initFlowbite } from 'flowbite';
import './bootstrap';
import 'flowbite';
import {Tab, initTE,} from "tw-elements";
  
initTE({ Tab });

document.addEventListener('livewire:navigated', () => {
    initFlowbite();
});

