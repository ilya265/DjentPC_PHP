<!DOCTYPE html>
<html lang="">

    <?php
    include ('header.php')
    ?>

    <title>Repair and maintenance</title>
    <link rel="stylesheet" href="/static/CSS/maintenance.css">
    <!-- popup ----->

    <div class="popup">

      <div class="exit" onclick="$('.popup')[0].style=('display: none')">
        <div></div>
        <div></div>
      </div>

      <div class="window">
        <h3>Order repairs</h3>
        <p>Enter your contact information</p>

        <form method="post" id="form">
          <div class="not_valid" style="display:none">Fill the field correctly</div>
          <input type="email" placeholder="Email" name="email">
          <input type="text" placeholder="Your name" name="name" required>
          <input type="tel" placeholder="Phone number" pattern="[0-9]{11}" name="tel" required>
          <input type="text" placeholder="Shortly describe your problem" name="problem" required>
          <button id='button' onclick="popupFormHide()">Send</button>
        </form>
        <h2>The order has been registered, we will respond to it as soon as possible.</h2>
      </div> 
    </div>

    <!-- popup end-->

    <section class="intro">
      <div class="intro_bg"></div>
      <div class="wrapper_center">
        <h1>Order repair</h1>
        <h3>Make an order and employer of our workshop will contact you!</h3>
          <a onclick="show_popup()">Make an order</a>
      </div>

    </section> 
    
    <section class="how_we_work">
        <h1>How we are working?</h1>
        <div class="wrapper_unification">
          <div class="wrapper_items">

            <div class="item one">
              <h3>Describe about the problem</h3>
              <p>Call our center, describe the problem, and a technician will come to you on the same day.</p>
            </div>

            <div class="item two_adaptive">
              <h3>Free diagnostics</h3>
              <p>Our technician will diagnose, report the problem and offer a solution.</p>
            </div>

            <div class="item three">
              <h3>Repair</h3>
              <p>We will agree on the price and timing, the master will begin work</p>
            </div>

          </div>

            <div class="figure">
              <div class="circle">1</div>
              <div class="line"></div>
              <div class="circle">2</div>
              <div class="line"></div>
              <div class="circle">3</div>
            </div>

            <div class="item two">
              <h3>Free diagnostics</h3>
              <p>Our technician will diagnose, report the problem and offer a solution.</p>
            </div>
        </div>
    </section>

    <section class="services_list">
      <h1>List of services</h1>
      <ul>
        <li>Installing OS.</li>
        <li>In-home computer repair.</li>
        <li>Replacement of USB ports, charging sockets, ports.</li>
        <li>Tablet repair at home, on-site.</li>
        <li>Replacement of laptop chip, replacement of video card.</li>
        <li>On-site maintenance of computers in the office.</li>
        <li>Blue screen, eliminating the causes of BSOD.</li>
        <li>Installing anti-virus software.</li>
        <li>Search Treatment Virus removal.</li>
        <li>Replacement of components.</li>
        <li>Installing Office, setting up Windows.</li>
        <li>Setting up a router, Wi-Fi, router, troubleshooting network problems.</li>
        <li>Connecting and setting up printers / scanners / MFPs / cameras, etc.</li>
        <li>Reset Windows password Deleting an account.</li>
        <li>Search and install drivers.</li>
        <li>Assembling a computer to suit your needs.</li>
        <li>Installing office programs.</li>
        <li>Installing and updating drivers.</li>
        <li>Cleaning laptops and computers from dust.</li>
        <li>Eliminating laptop overheating and shutdown.</li>
        <li>Eliminating laptop noise/lubricating and replacing fans.</li>
        <li>Removing viruses / ransomware / SMS banner blockers.</li>
        <li>Cleaning dust from a laptop PC Installing antivirus / parental controls.</li>
        <li>Installation of programs for work / study / Internet / games and entertainment.</li>
        <li>Data recovery after deletion and formatting from hard drives.</li>
        <li>Transferring data to a new computer / moving a PC with a connection to a new location.</li>
        <li>Training to work with computers and the Internet.</li>
      </ul>

      <p>We announce the price before starting work, it does not change after completion. The work is considered completed only after you are satisfied with it. After payment for the service, a guarantee is issued.</p>
    </section>

    <?php
      include ('footer.php');
    ?>
    <script src="/static/JS/maintenance.js"></script>
</html>
