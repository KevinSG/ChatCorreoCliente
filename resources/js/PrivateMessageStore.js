import Vue from 'vue'
import _ from 'lodash'

const state = {
  messageRec: [],
  subjectRec: [],
  messageSent: [],
  subjectSent: [],
  message: {
    subject: '',
    message: '',
    sender: {}
  },
  users: ''
}

const mutations = {
  SET_MESSAGES_REC (state, messages) {
    //console.log(messages.data);
    state.messageRec = messages.data;
  },
  SET_SUBJECT_REC (state, subjects) {
    //console.log(subjects.data);
    state.subjectRec = subjects.data;
  },
  // SET_MESSAGE_VIEW (state, message) {
  //   state.message = message
  // },
  SET_SUBJECT_VIEW (state, message) {
    state.message = message.data
  },
  CLEAR_MESSAGE_VIEW (state) {
    state.message = {
      subject: '',
      message: '',
      sender: {}
    }
  },
  SET_USER_LIST (state, users) {
    state.users = users.data
  },
  SEND_PRIVATE_MESSAGE (state, message) {
    //console.log(state)
    state.messageSent.push(message.data);
  },
  SEND_SUBJECT (state, message) {
    //console.log(state.subjectSent);
    state.subjectSent.push(message);
  },
  SET_SUBJECT_SENT (state, messages) {
    state.messageSent = messages
  },
  NEW_PM_NOTIFICATION (state, message) {
    state.messageRec.unshift(message)
  },
  NEW_SJ_NOTIFICATION (state, message) {
    //console.log(state, message);
    state.subjectRec.unshift(message)
  }
}

const actions = {

//--------------------------------------------------------------------------------- 
//Hace una consulta de los mensajes y el asunto 
  setUserMessagesRec: ({commit}, subject) => {
    let postData = {id: subject}
    return axios.post(`/api/v1/get-private-messages/{id}`, postData)
      .then(response => {
        commit('SET_MESSAGES_REC', response.data)
      })
  },
  setUserSubjectsRec: ({commit}, user) => {
    let postData = {id: user.id}
    return axios.post(`/api/v1/get-subject-messages/{id}`, postData)
      .then(response => {
        commit('SET_SUBJECT_REC', response.data)
      })
  },
//----------------------------------------------------------------------------------
//  muestra en detalle el asunto
  // getPrivateMessageById: ({commit}, id) => {
  //   let postData = {id: id}
  //   return axios.post(`/api/v1/get-private-message/{id}`, postData)
  //     .then(response => {
  //       commit('SET_MESSAGE_VIEW', response.data)
  //     })
  // },
  getSubjectMessageById: ({commit}, id) => {
    let postData = {id: id}
    return axios.post(`/api/v1/get-subject-message/{id}`, postData)
      .then(response => {
        commit('SET_SUBJECT_VIEW', response.data)
      })
  },
//----------------------------------------------------------------------------------
  // clearMessageView: ({commit}) => {
  //   commit('CLEAR_MESSAGE_VIEW')
  // },
  sendPrivateMessage: ({commit}, postData) => {
    return axios.post(`/api/v1/send-private-message`, postData)
      .then(response => {
        commit('SEND_PRIVATE_MESSAGE', response.data)
        return response
      })
  },
  sendSubject: ({commit}, postData) => {
    return axios.post(`/api/v1/send-subject`, postData)
      .then(response => {
        commit('SEND_SUBJECT', response.data)
        return response
      })
  },
  setUserSubjectSent: ({commit}, user) => {
    let postData = {id: user.id}
    return axios.post(`/api/v1/get-subject-messages-sent/{id}`, postData)
      .then(response => {
        commit('SET_SUBJECT_SENT', response.data)
        return response
      })
  },
  getUserList: ({commit}) => {
    return axios.get(`/api/v1/user-list`)
      .then(response => {
        if (response.status === 200) {
          commit('SET_USER_LIST', response.data)
          return response.data
        }
      })
  },
  newMessageNotification: ({commit}, message) => {
    commit('NEW_PM_NOTIFICATION', message)
  },
  newSubjectNotification: ({commit}, message) => {
    commit('NEW_SJ_NOTIFICATION', message)
  },
}

export default {
      state, 
      mutations, 
      actions
}