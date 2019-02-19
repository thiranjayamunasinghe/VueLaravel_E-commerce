<html>
<h2>To verify Email</h2><a href="{{route('sendEmailDone',["email" => $user->email,"verifyToken" => $user->verifyToken])}}">click here</a>
</html>