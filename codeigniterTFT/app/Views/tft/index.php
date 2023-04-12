<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/index.css">
</head>
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  body {
    font-size: 16px;
  }
  
  header {
    background-color: orange;
    padding: 20px;
  } 
  main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .hero {
    background-image: url(hero.jpg);
    background-size: cover;
    background-position: center;
    height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  
  .hero h1 {
    font-size: 50px;
    color: white;
    text-shadow: 2px 2px 4px black;
  }
  
  .hero p {
    font-size: 24px;
    color: white;
    text-shadow: 2px 2px 4px black;
    margin-bottom: 20px;
  }
  
  .hero button {
    background-color: white;
    color: orange;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }
    
    .hero button:hover {
    background-color: #ff6600;
    color: white;
    }
    
    .about {
    margin-top: 50px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
    }
    
    .about h2 {
    font-size: 36px;
    margin-bottom: 20px;
    }
    
    .about p {
    font-size: 18px;
    margin-bottom: 20px;
    }
    
    .about img {
    width: 100%;
    max-width: 400px;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .services {
    margin-top: 50px;
    text-align: center;
    }
    
    .services h2 {
    font-size: 36px;
    margin-bottom: 20px;
    }
    
    .services ul {
    list-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    }
    
    .services li {
    font-size: 24px;
    margin-right: 20px;
    margin-bottom: 20px;
    }
    
    .contact {
    margin-top: 50px;
    text-align: center;
    }
    
    .contact h2 {
    font-size: 36px;
    margin-bottom: 20px;
    }
    
    .contact form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }
    
    .contact label {
    font-size: 24px;
    margin-bottom: 10px;
    }
    
    .contact input,
    .contact textarea {
    width: 100%;
    max-width: 400px;
    margin-bottom: 20px;
    padding: 10px;
    font-size: 18px;
    border-radius: 5px;
    border: 1px solid #ccc;
    }
    
    .contact button {
    background-color: orange;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }
    
    .contact button:hover {
    background-color: #ff6600;
    }
    
</style>
<div class="div">

</div>

<body>
  <main>
    <section class="hero">
      <h1>Welcome to our Sporty Website</h1>
      <p>Join our gym and get fit today!</p>
      <button>Join Now</button>
    </section>
    
    <section class="about">
      <h2>About Us</h2>
      <p>We are a state-of-the-art gym with top-notch facilities and expert trainers.</p>
      <img src="gym.jpg" alt="Gym">
    </section>
    
    <section class="services">
      <h2>Our Services</h2>
      <ul>
        <li>Cardio equipment</li>
        <li>Strength training equipment</li>
        <li>Group fitness classes</li>
        <li>Personal training</li>
      </ul>
    </section>
    
    <section class="contact">
      <h2>Contact Us</h2>
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
        <button>Send</button>
      </form>
      
    </section>
  </main>
  
</body>