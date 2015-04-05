<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>People's Q!</title>


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link href="css/modern-business.css" rel="stylesheet">   

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<link href="css/pq.css" rel="stylesheet">   


<style type="text/css">
    body{
      padding-top: 70px;
    }
</style>
</head>
<body>

<?php

include ('/include/elementClass.php');
$user = '';
if(!empty($_GET['username']))
{
    $user = $_GET['username'];
}
$element = new ConstantElements();

$element->SetUser($user);
print $element->GetHeader();

print $element->GetReplyModal();
?>      

<!-- Start Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
        <div class="modal-content pq-modal-body">
                <div class="modal-header pq-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Log In
                </div>
                <div class="modal-body ">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <div class="">                                  
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class="">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class = "form-group form-inline">
                                <button type="submit" class="btn btn-primary btn-sm" >Sign In</button>
                                <a href="signup.php"> <large> Sign Up Now! </large> </a>
                        </div>
                        <a href="signup.php"> <small> Forgot your password? </small></a>
                        </form>
                </div>
        </div>
   </div>
</div>
<!-- End Login Modal -->

<!-- Start of Body -->

<div class="container">
              <div class="row">
                        <h1> <i class="glyphicon glyphicon-search"></i> Foods and Restaurants</h1>
                </div>   

        <div class="panel panel-primary">
            <div class="panel-heading">Sinigang Na Lechon</div>
                <div class="panel-body">
                    <p><img src='../img/sinigawanglechon.jpeg'/></p> 
                    <b>Nutrition Information/serving:</b>
                    <p>One of a kind Filipino recipe! Roasted suckling pig and fresh vegetables simmered in tamarind broth.</p>
                    <p>Calories 258, Carbohydrates 8g, Protein 25g, Fat 14g, Vitamin C 13mg, Iron 2mg, Vitamin A 358mcg</p>
                     
                    <p>To lessen fat intake when the soup is cold remove the layer of fat that has formed on the surface and reheat before serving.</p>
                     
                    <p>Lechon's crispy brown skin is the result of the high temperature during roasting which cannot be achieved in other cooking methods. This gives the aroma and meaty flavor of roasted meats. So when used in stewed or simmered dishes like sinigang it adds a depth of flavor to the dish.</p>
                </div>
                
                <div class="panel-footer">

                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-thumbs-up"></i> Up</button>
                        </div>
                    
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-thumbs-down"></i> Down</button>
                        </div>                    
                    </div>

                </div>
            </div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="page-header">Comments</h2>
        <section class="comment-list">
          <!-- First Comment -->
          <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Second Comment Reply -->
          <div class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-heading right">Reply</div>
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Third Comment -->
          <div class="row">
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow right">
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
          </div>
          <!-- Fourth Comment -->
          <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Fifth Comment -->
          <div class="row">
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow right">
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
          </div>
          <!-- Sixth Comment Reply -->
          <div class="row">
            <div class="col-md-9 col-sm-9 col-md-offset-1 col-md-pull-1 col-sm-offset-0">
              <div class="panel panel-default arrow right">
                <div class="panel-heading">Reply</div>
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 col-md-pull-1 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg">
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>



<div class="row">
    <div class="col-xs-12">
      <footer>
                    <p>Copyright &copy; Team CMC 2015</p>
      </footer>
    </div>
  </div>
</div>
  

<!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
