import Home from '../pages/Home.vue';
import ContactUs from '../pages/ContactUs.vue';
import AboutUs from '../pages/AboutUs.vue';
import PostsIndex from '../pages/Posts.index.vue';


const routes = [
    {
        path: '/',
        name: 'home',
        component: Home

    },

    {
        path: '/contatti',
        name: 'contact-us',
        component: ContactUs

    },

    {
        path: '/chi-siamo',
        name: 'about-us',
        component: AboutUs

    },

    {
        path: '/blog',
        name: 'posts-index',
        component: PostsIndex

    }
    
];

export default routes