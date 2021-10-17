import axios from "axios";

window.deleteUser = async function deleteUser(user){
    
    let url = route('users.destroy', user);
    let deleted = await axios.delete(url);
  
    console.log(deleted)
}