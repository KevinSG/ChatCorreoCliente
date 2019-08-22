//require('./PrivateMessageStore')
// import PrivateMessageStore from './PrivateMessageStore'


// window.Vue = require('vue');
// window.Vuex = require('vuex');

// export default new Vuex.Store({
//   modules: {
// 	PrivateMessageStore
//   },
// })

import Vue from 'vue'
import Vuex from 'vuex'


import PrivateMessageStore from './PrivateMessageStore'

Vue.use(Vuex)
const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
	PrivateMessageStore
  },
  strict: debug
})
