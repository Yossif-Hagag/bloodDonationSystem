@extends('layouts.app')

@section('style')
<style>
            body  {
                background-image: url( "../images/dash2.jpg");
                background-position: center;
                background-size: cover;
                /background-color: #cccccc;/
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
            }
            
            .containerr{
                width: 70%;
                border: 2px solid rgba(195,6,46,1);
                background-color: rgba(195,6,46,0.7) ;
                border-radius: 15px;
            }
            .file-input label,.inputBlue{
                width: 60%;
                height: 50px;
                color: #707070;
                font-style: bold;
                text-align: left;
                font-size: 25px;
                text-align: center;
                margin-bottom: 15px;
                border: 3px solid #223862;
                border-radius: 5px;
                background-color: #FFF;
            }
            .btnBlue{
                width: 60%;
                height: 60px;
                font-size: 30px;
                text-align: center;
                margin-bottom: 15px;
                border-radius: 3px solid rgba(195,6,46,0.7);
                border-radius: 10px;
                background-color: #223862;
                color: white;
                cursor: pointer;
            }
            .file {
              opacity: 0;
              width: 0.1px;
              height: 0.1px;
              position:absolute
            }
            .file-input label {
                  display: block;
                  position: relative;
                  width: 60%;
                  height: 50px;
                  border-radius: 5px;
                  background-color: #FFF ;
                 /* box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);*/
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  color: #707070;
                  font-weight: normal;
                  cursor: pointer;
                 
            }
            .file-name {
              position: absolute;
              bottom: -35px;
              left: 10px;
              font-size: 1rem;
              color: #FFF;
            }
            hr{
                color: white
            }


           
           
        </style>
 @endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}"> Dashboard </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/adminProfile') }}"> Profile </a>
    </li>
@endsection

@section('content')
<center>
            <table style="margin-top: 20px;width:50%;border-radius: 10px; ">
                
                <tr  class="containerr">
                   <!-- <td width="10%" height="90% ;border:none;margin-top:-50px">
                        <img src="hospital.png" style="border-radius:50%; width: 120px;height:120px;border:3px solid #707070;float: right;"/>
                        
                        
                        
                    </td>-->
                    
                    <td width="100%" >
                        <center>
                              <div style="margin:15px 0 0 0">
                                  <h1 style="color: white">Add Admin</h1>
                                  @if($errors->count() > 0)
                                    <ul class="m-2">
                                        @foreach($errors->all() as $error)

                                            <li style="list-style-type: none;color:#fff;">{{$error}}</li>
                                        @endforeach
                                    </ul>
                                  @endif
                                  <hr>
                                  <form method ="POST" action="{{url('storeAdmin')}}" enctype="multipart/form-data">
                                  @csrf
                                      <input class="inputBlue" type="text" id="name" name="name" placeholder=" Name" required>
                                      <input class="inputBlue" type="email" id="email" name="email" placeholder="Email" required>
                                      <input class="inputBlue" type="password" id="pass" name="password" placeholder="Password" required>
                                      <input class="inputBlue" type="password" id="cpass" name="password_confirmation" placeholder="Confirm Password" required>
                                      <input class="inputBlue" type="text" id="phone" name="phone" placeholder=" Phone" required><br>
                                      <div class="file-input">
                                      <input type="file" id="file" class="file" name="photo">
                                      <label for="file">
                                        Select Image
                                        <p class="file-name"></p>
                                      </label>
                                      @error('photo')
                                        <small class="form-text text-danger">{{$message}}</small>
                                      @enderror
                                    </div>
                                    
                                     <hr>
                                     <br>

                                    
                                     <input type="submit" class="btnBlue" onclick="check()" value="Add">
                                     
                                      
                                 </form> 
                            </div>
                       </center>                         
                    </td>
                </tr>
            </table>
        </center>
        <script>
            const file = document.querySelector('#file');
            file.addEventListener('change', (e) => {
              // Get the selected file
              const [file] = e.target.files;
              // Get the file name and size
              const { name: fileName, size } = file;
              // Convert size in bytes to kilo bytes
              const fileSize = (size / 1000).toFixed(2);
              // Set the text content
              const fileNameAndSize = `${fileName} - ${fileSize}KB`;
              document.querySelector('.file-name').textContent = fileNameAndSize;
            });

        </script>

@endsection