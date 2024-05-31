
import { reactive, onMounted } from 'vue';

// diri iretrieve ang name ug usertype gikan database
// example lang sa karon
export const user = reactive({
  name: 'kent   luna escoto',
  role: 'superadmin'
});



const state = reactive({
  user:{
      id: null,
      name: null,
      email: null,
  },
})


async function fetchUser(){
  const params = { 
  Authorization: "Bearer " + localStorage.getItem('_token'),
  Accept: "application/json"
}
try{
  const response = await $fetch(`http://127.0.0.1:8000/api/user`, {
  method: 'GET',
  headers: params})

  console.log(response.id)
  state.user.name = response.name
  state.user.role = response.email

  }

catch(error){
  
  console.log(error.response)
  console.log('error', error)

  //IF WALA NAKA LOGIN MO BALIK SIYA SA LOGIN PAGE
  navigateTo('/')
  }
}

onMounted(() => {
  fetchUser();
});
