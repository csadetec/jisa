const app = () => {
    const hostname = window.location.hostname 
  
    if(hostname === 'jisa.azurewebsites.net'){
      return 'https://jisa.azurewebsites.net/index.php'
    }
    return 'http://jisa.com'
  }
  //console.log('teste')
  console.log(app())