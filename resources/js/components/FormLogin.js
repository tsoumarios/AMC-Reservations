// import './Form.css';
import Modal from './Modal.js'
import React from 'react';

class FormLogin extends React.Component {

  constructor(props)
  {
    super(props);

    this.state = {
      visibility: true
    };

    this.state = {
      show: false
    }

    this.showModal = this.showModal.bind(this);
    this.hideModal = this.hideModal.bind(this);
    this.toggleVisibility = this.toggleVisibility.bind(this);
  }

  toggleVisibility() {
    this.setState(state => {
      if(state.visibility === true)
      {
        return {visibility: false};
      }

      else {
        return {visibility: true};
      }
    })
  }

  // showModal = () => {
  //   this.setState ({
  //     show: true
  //   })
  // }

  // hideModal = () => {
  //   this.setState({
  //     show: false
  //   })
  // }
  

  render() {
if (this.state.visibility === true)
{
  return(
    <div className = "container">
      <div className = "image">


        <div className = "form-general animate fadeInDown">
          <div className = "main-form">

          <label>Email</label>
          <input type = "email" placeholder = "Email or Username"></input>

          <label>Password</label>
          <input type = "password" placeholder = "Password..."></input>

          <a href = "#" className = "loginButton">Login</a>
          <em id = "transEm">Or <a href = "#" onClick = {this.toggleVisibility} id = "transButton">Signup</a></em>
  
          <div className = "social-media">
          <a href = "https://accounts.google.com/"><img src = "https://cdn.discordapp.com/attachments/690272355473162639/816388631681302548/gmaillogin.png" id = "gmail-logo"></img></a>
          <a href = "https://www.facebook.com/"><img src = "https://cdn.discordapp.com/attachments/690272355473162639/816388623733489694/facebooklogin.png" id = "fb-logo"></img></a>          
          </div>
          </div>

          <div className = "text-container">
            {/* LOGO */}
            <img src="https://i.ibb.co/JtmbZ1F/main-logo.png" alt="main-logo" border="0"  id = "logo-form"/>            
            <h1 className = "header-welcome"></h1>
            <em>Sign up and join hundreds of shops within your area.</em>
          </div>
        </div>
      </div>
    </div>
  );
}

else {
  if (this.state.showModal === true)
  {
    return(
      <div className = "container">
        <div className = "image">
  
  
          <div className = "form-general">
            <div className = "main-form">
            <label>Full Name</label>
            <input type = "text" placeholder = "First Name..."></input>
  
            <label>Last Name</label>
            <input type = "text" placeholder = "Last Name..."></input>
  
            <label>Password</label>
            <input type = "password" placeholder = "Password..."></input>
  
            <label>Email</label>
            <input type = "email" placeholder = "Email..."></input>
  
            <Modal show={this.state.show} handleClose={this.hideModal}>
            <h1 className = "modal-head animate fadeInDown">Terms and Conditions</h1>
            <p>The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.
                A Termination clause will inform that users' accounts on your website and mobile app or users' access to your website and mobile (if users can't have an account with you) can be terminated in case of abuses or at your sole discretion.
                A Governing Law will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.
                A Links To Other Web Sites clause will inform users that you are not responsible for any third party websites that you link to. This kind of clause will generally inform users that they are responsible for reading and agreeing (or disagreeing) with the Terms and Conditions or Privacy Policies of these third parties.
                If your website or mobile app allows users to create content and make that content public to other users, a Content section will inform users that they own the rights to the content they have created. The "Content" clause usually mentions that users must give you (the website or mobile app developer) a license so that you can share this content on your website/mobile app and to make it available to other users.
                
                Because the content created by users is public to other users, a DMCA notice clause (or Copyright Infringement ) section is helpful to inform users and copyright authors that, if any content is found to be a copyright infringement, you will respond to any DMCA takedown notices received and you will take down the content.
                
                A Limit What Users Can Do clause can inform users that by agreeing to use your service, they're also agreeing to not do certain things. This can be part of a very long and thorough list in your Terms and Conditions agreements so as to encompass the most amount of negative uses.</p>
            </Modal>
            <i>*By clicking Signup, you accept our <em onClick = {this.showModal} className = "terms">Terms and Conditions</em></i>
  
            <a href = "#" className = "loginButton">Signup</a>
            <em id = "transEm">Or <a href = "#" onClick = {this.toggleVisibility} id = "transButton">Login</a></em>
            </div>

            
  
            <div className = "text-container" id = "text-signup-container">
              {/* LOGO */}
              <img src="https://i.ibb.co/JtmbZ1F/main-logo.png" alt="main-logo" border="0" id = "logo-form"/>            
              <h1 className = "header-welcome"></h1>
              <em>Sign up and join hundreds of shops within your area</em>
            </div>
            
          </div>
        </div>
      </div>
    );
  }

  else {
    return(
      <div className = "container">
        <div className = "image">
  
  
          <div className = "form-general animate fadeInDown">
            <div className = "main-form ">
              <div className = "input-row">
                <div className = "labels-inputs">
                <label id = "mobil-label">Full Name</label>
                <input type = "text" placeholder = "Full Name..."></input>
                </div>
                <div className = "labels-inputs">
                <label>Phone Number</label>
                <input type = "tel" placeholder = "Phone Number..."></input>
                </div>
                
                
              </div>
            
            <div className = "input-row">
              <div className = "labels-inputs">
              <label>Password</label>
              <input type = "password" placeholder = "Password..."></input>
              </div>
              <div className = "labels-inputs">
              <label>Confirm Password</label>
              <input type = "password" placeholder = "Password..."></input>
              </div>
              
            </div>
            <div className = "input-row">
              <div className = "labels-inputs">
              <label>Email</label>
              <input type = "email" placeholder = "Email..."></input>
              </div>
            </div>

            
  
            

            
            <Modal show={this.state.show} handleClose={this.hideModal}>
            <h1 className = "modal-head">Terms and Conditions</h1>
            <p>The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.
  A Termination clause will inform that users' accounts on your website and mobile app or users' access to your website and mobile (if users can't have an account with you) can be terminated in case of abuses or at your sole discretion.
  A Governing Law will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.
  A Links To Other Web Sites clause will inform users that you are not responsible for any third party websites that you link to. This kind of clause will generally inform users that they are responsible for reading and agreeing (or disagreeing) with the Terms and Conditions or Privacy Policies of these third parties.
  If your website or mobile app allows users to create content and make that content public to other users, a Content section will inform users that they own the rights to the content they have created. The "Content" clause usually mentions that users must give you (the website or mobile app developer) a license so that you can share this content on your website/mobile app and to make it available to other users.
  
  Because the content created by users is public to other users, a DMCA notice clause (or Copyright Infringement ) section is helpful to inform users and copyright authors that, if any content is found to be a copyright infringement, you will respond to any DMCA takedown notices received and you will take down the content.
  
  A Limit What Users Can Do clause can inform users that by agreeing to use your service, they're also agreeing to not do certain things. This can be part of a very long and thorough list in your Terms and Conditions agreements so as to encompass the most amount of negative uses.</p>
            </Modal>
            <i>*By clicking Signup, you accept our <em onClick = {this.showModal} className = "terms">Terms and Conditions</em></i>
  
            <a href = "#" className = "loginButton">Signup</a>
            {/*             <em id = "transEm">Or <a href = "#" onClick = {this.toggleVisibility} id = "transButton">Login</a></em>*/}
            </div>
  
            <div className = "text-container" id = "text-signup-container">
              {/* LOGO */}
              <img src="https://i.ibb.co/JtmbZ1F/main-logo.png" alt="main-logo" border="0"  id = "logo-form"/>            
              <h1 className = "header-welcome"></h1>
              <em>Sign up and join hundreds of shops within your area</em>
              <p>Already Registered?</p>
              <a href = "#" className = "loginButton" onClick = {this.toggleVisibility}>Login</a>
            </div>
            
          </div>
        </div>
      </div>
    );
  }
}
  }
}
  
export default FormLogin;
