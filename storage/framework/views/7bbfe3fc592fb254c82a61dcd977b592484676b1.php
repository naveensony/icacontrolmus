
  <!-- END CONTENT -->
  
  
  
    <!-- START FOOTER -->
    
    <div id="footer" class="grid_12">
    
        <p>&copy; Copyright <?=date('Y')?> Musika LLC | Powered by <a href="http://www.codeigniter.com/">CodeIgniter</a></p>
	</div>
    <!-- END FOOTER -->  
    
    
    
</div>

<!-- Info is shown when a link with these 
attributes are clicked: href="#info" rel="facebox"  -->

<div id="info" class="pngfix" style="display:none;"> 

    <h3>Messages</h3>
    
    <div class="pngfix notification messages canhide">
    
        <p><strong>WELCOME BACK JOHN.</strong>YOU HAVE 2 NEW MESSAGES IN YOUR INBOX</p>
        
	</div>
    
    <!-- DIV TO CLEAR THE FLOATS -->
    <div class="clearfix">&nbsp;</div>
    
    <!-- MESSAGE DIV -->
    <div class="message">
    
        <h4>28rd April 2010 <small>from Admin</small></h4>
        
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor faucibus tellus, at suscipit metus vestibulum tristique. Duis eget metus neque. In non magna lorem. Nam non arcu eu odio blandit lobortis. <a href="#">DELETE</a></p>

   </div>
   
   <!-- MESSAGE DIV --> 
   <div class="message">
    <h4>23rd April 2010 <small>from Admin</small></h4>
        
    <p>
        Vestibulum in ante faucibus est facilisis iaculis pharetra quis mi. Fusce vitae mauris sit amet elit dapibus molestie. Duis tincidunt, urna in mollis congue, neque odio porttitor ipsum, ut consequat leo tellus sed felis. Sed bibendum, dolor eget sagittis cursus, nunc elit scelerisque purus, sed pulvinar risus mi a mauris. <a href="#">DELETE</a></p>
   </div>
    
    <!-- FORM FOR NEW MESSAGE --> 
    <form action="" method="post">
    
        <h3>New Message</h3>
        
        <fieldset>
        
            <textarea class="textarea" name="textfield" cols="55" rows="5"></textarea>
        
        </fieldset>
        
        <fieldset>
        
            <select name="combo" class="select">
            
                <option value="option1">Send to...</option>
                <option value="option2">Admin</option>
                <option value="option2">I.T.</option>
                <option value="option3">Sales</option>
        
            </select>
        
        	<input type="submit" class="submit" value="Send" />
        
        </fieldset>
    
    
    </form>

</div> <!-- End #Info -->


</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/layouts/layout_control/footer.blade.php ENDPATH**/ ?>