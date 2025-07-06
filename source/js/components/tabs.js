// import Tabs from '../functions/scripts/tabs';

// --------------- tabs custom function --------------- //

import Tabs from "../functions/scripts/tabs";

document.addEventListener("DOMContentLoaded", function () {
  window.tabsInstance = new Tabs("[data-tabs-parent]", "data-tab", "data-tab-content");

});
