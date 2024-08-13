import './bootstrap';
import { createApp } from 'vue';
import ItemList from "./components/ItemList.vue";
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faChevronRight } from "@fortawesome/free-solid-svg-icons";
import { faChevronDown } from "@fortawesome/free-solid-svg-icons";

library.add(faChevronRight);
library.add(faChevronDown);

createApp({
    components: {
        ItemList,
    }
}).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
