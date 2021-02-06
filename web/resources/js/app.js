import { create_application, run
       } from '../../../lib/fireh_react/core/application.jsx';
//-
import WebsiteInit from './initialize.js';


const initializations = [
    WebsiteInit,
];


const components = [
];


const pages = [
];


function onload()
{
    let app = create_application({name: "SMP Angkasa ATS"}, initializations);
    run(app, components, pages, document.getElementById('js_app'));
}
if (document.readyState !== 'loading') onload();
else document.addEventListener('DOMContentLoaded', onload);
