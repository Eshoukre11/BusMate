import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:lottie/lottie.dart';
import 'package:mo7/presentation/screens/welcome_screen.dart';
import '../../business_logic/cubit/cubit/authcubit_cubit.dart';
import 'login_screen.dart';

class RegistrationScreen extends StatefulWidget {
  const RegistrationScreen({Key? key}) : super(key: key);

  @override
  _RegistrationScreenState createState() => _RegistrationScreenState();
}

class _RegistrationScreenState extends State<RegistrationScreen> {
  // string for displaying the error Message
  String? errorMessage;

  bool _obscureText = true;
  bool __obscureText = true;

  var _fullname = '';
  var _email = '';

  // our form key
  final _formKey = GlobalKey<FormState>();

  // editing Controller
  final fullnameEditingController = new TextEditingController();
  final subscriber_typeEditingController = new TextEditingController();
  final collegeNumberEditingController = new TextEditingController();
  final phoneEditingController = new TextEditingController();
  final emailEditingController = new TextEditingController();
  final passwordEditingController = new TextEditingController();
  final collegeEditingController = new TextEditingController();
  String dropdownvalue = 'Item 1';

  // List of items in our dropdown menu

  @override
  Widget build(BuildContext context) {
    //first name field
    final fullnameField = TextFormField(
        autofocus: false,
        controller: fullnameEditingController,
        keyboardType: TextInputType.name,
        validator: (value) {
          RegExp regex = new RegExp(r'^.{3,}$');
          if (value!.isEmpty) {
            return ("Full Name cannot be Empty");
          }
          if (!regex.hasMatch(value)) {
            return ("Enter Valid name(Min. 3 Character)");
          }
          return null;
        },
        onSaved: (value) {
          fullnameEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.account_circle),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "Full Name",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));
    final college = TextFormField(
        autofocus: false,
        controller: collegeEditingController,
        keyboardType: TextInputType.name,
        validator: (value) {
          RegExp regex = new RegExp(r'^.{3,}$');
          if (value!.isEmpty) {
            return ("College cannot be Empty");
          }
          if (!regex.hasMatch(value)) {
            return ("Enter Valid name(Min. 3 Character)");
          }
          return null;
        },
        onSaved: (value) {
          collegeEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.account_balance_outlined),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "college",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));
    final subscriber_type = TextFormField(
        autofocus: false,
        controller: subscriber_typeEditingController,
        keyboardType: TextInputType.text,
        // validator: (value) {
        //   RegExp regex = new RegExp(r'^.{3,}$');
        //   if (value!.isEmpty) {
        //     return ("Full Name cannot be Empty");
        //   }
        //   if (!regex.hasMatch(value)) {
        //     return ("Enter Valid name(Min. 3 Character)");
        //   }
        //   return null;
        // },
        onSaved: (value) {
          subscriber_typeEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.account_circle),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "Type : student/stuff",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));
    final collegeNumber = TextFormField(
        autofocus: false,
        controller: collegeNumberEditingController,
        keyboardType: TextInputType.number,
        // validator: (value) {
        //   RegExp regex = new RegExp(r'^.{3,}$');
        //   if (value!.isEmpty) {
        //     return ("Full Name cannot be Empty");
        //   }
        //   if (!regex.hasMatch(value)) {
        //     return ("Enter Valid name(Min. 3 Character)");
        //   }
        //   return null;
        // },
        onSaved: (value) {
          collegeNumberEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.pin),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "collegeNumber",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));

    //email field
    final emailField = TextFormField(
        autofocus: false,
        controller: emailEditingController,
        keyboardType: TextInputType.emailAddress,
        validator: (value) {
          if (value!.isEmpty) {
            return ("Please Enter Your Email");
          }
          // reg expression for email validation
          if (!RegExp("^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+.[a-z]")
              .hasMatch(value)) {
            return ("Please Enter a valid email");
          }
          return null;
        },
        onSaved: (value) {
          emailEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.mail),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "Email",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));

    //password field
    final passwordField = TextFormField(
        autofocus: false,
        controller: passwordEditingController,
        obscureText: _obscureText,
        validator: (value) {
          RegExp regex = new RegExp(r'^.{6,}$');
          if (value!.isEmpty) {
            return ("Password is required");
          }
          if (!regex.hasMatch(value)) {
            return ("Enter Valid Password(Min. 6 Character)");
          }
        },
        onSaved: (value) {
          passwordEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.vpn_key),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "Password",
          suffixIcon: GestureDetector(
            onTap: () {
              setState(() {
                _obscureText = !_obscureText;
              });
            },
            child: Icon(
              _obscureText ? Icons.visibility : Icons.visibility_off,
            ),
          ),
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));

    //confirm password field
    // final phone = TextFormField(
    //     autofocus: false,
    //     controller: phoneEditingController,
    //     keyboardType: TextInputType.number,
    //     obscureText: __obscureText,
    //     // validator: (value) {
    //     //   if (value!.isEmpty) {
    //     //     return ("Password is required");
    //     //   }
    //     //   if (phoneEditingController.text !=
    //     //       passwordEditingController.text) {
    //     //     return "Password don't match";
    //     //   }
    //     //   return null;
    //     // },
    //     onSaved: (value) {
    //       phoneEditingController.text = value!;
    //     },
    //     textInputAction: TextInputAction.done,
    //     decoration: InputDecoration(
    //       prefixIcon: Icon(Icons.phone),
    //       contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
    //       hintText: "Phone",
    //       suffixIcon: GestureDetector(
    //         onTap: () {
    //           setState(() {
    //             __obscureText = !__obscureText;
    //           });
    //         },
    //       ),
    //       border: OutlineInputBorder(
    //         borderRadius: BorderRadius.circular(10),
    //       ),
    //     ));
    final phone = TextFormField(
        autofocus: false,
        controller: phoneEditingController,
        keyboardType: TextInputType.number,
        // validator: (value) {
        //   RegExp regex = new RegExp(r'^.{3,}$');
        //   if (value!.isEmpty) {
        //     return ("Full Name cannot be Empty");
        //   }
        //   if (!regex.hasMatch(value)) {
        //     return ("Enter Valid name(Min. 3 Character)");
        //   }
        //   return null;
        // },
        onSaved: (value) {
          phoneEditingController.text = value!;
        },
        textInputAction: TextInputAction.next,
        decoration: InputDecoration(
          prefixIcon: Icon(Icons.phone),
          contentPadding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          hintText: "phone",
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ));

    //signup button
    final signUpButton = Material(
      elevation: 5,
      borderRadius: BorderRadius.circular(10),
      color: Colors.deepPurple,
      child: MaterialButton(
          padding: EdgeInsets.fromLTRB(20, 15, 20, 15),
          minWidth: MediaQuery.of(context).size.width,
          onPressed: () {
            BlocProvider.of<AuthcubitCubit>(context)
                .registerMethod(
              mail:emailEditingController.text ,
              pass: passwordEditingController.text,
              phone: phoneEditingController.text,
              college_number: collegeNumberEditingController.text,
              college: collegeEditingController.text,
              full_name: fullnameEditingController.text,
              subscriber_type: subscriber_typeEditingController.text,
            );
            print(subscriber_typeEditingController.text);
            signUp(
              emailEditingController.text,
              passwordEditingController.text,
              phoneEditingController.text,
              collegeNumberEditingController.text,
              collegeNumberEditingController.text,
              fullnameEditingController.text,
              subscriber_typeEditingController.text
            );
          },
          child: Text(
            "SignUp",
            textAlign: TextAlign.center,
            style: TextStyle(
                fontSize: 20, color: Colors.white, fontWeight: FontWeight.bold),
          )),
    );

    return Scaffold(
      backgroundColor: Colors.white,
      // appBar: AppBar(
      //   backgroundColor: Colors.transparent,
      //   elevation: 0,
      //   leading: IconButton(
      //     icon: Icon(
      //       Icons.arrow_back,
      //       color: Colors.black,
      //       size: 30,
      //     ),
      //     onPressed: () {
      //       // passing this to our root
      //       Navigator.of(context).pushReplacement(
      //           MaterialPageRoute(builder: (context) => WelcomeScreen()));
      //     },
      //   ),
      // ),
      body: Center(
        child: Container(
          width: double.infinity,
          height: double.infinity,
          color: Colors.white,
          child: Padding(
            padding: const EdgeInsets.only(left: 5,right: 5),
            child: Form(
              key: _formKey,
              child: Container(
                width: double.infinity,
                height: double.infinity,
                child: SingleChildScrollView(
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: <Widget>[
                      Container(
                        width: 80, // Set a fixed width
                        height: 80,
                        child: Lottie.asset(
                          'assets/images/sign-up.json',
                          width: 80,
                          height: 80,
                        ),
                      ),
                      SizedBox(
                        height: 15,
                      ),
                      Text(
                        'Registeration',
                        style: GoogleFonts.poppins(
                            color: Colors.black,
                            fontSize: 20,
                            fontWeight: FontWeight.w700),
                      ),
                      SizedBox(height: 45),
                      fullnameField,
                      SizedBox(height: 10),
                      emailField,
                      SizedBox(height: 10),
                      passwordField,
                      SizedBox(height: 10),
                      subscriber_type,
                      SizedBox(height: 10),
                      college,
                      SizedBox(height: 10),
                      collegeNumber,
                      SizedBox(height: 10),
                      phone,
                      // SizedBox(height: 10),
                      // phone,

                      SizedBox(height: 10),
                      signUpButton,
                      SizedBox(height: 20),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("Already registered? "),
                          GestureDetector(
                            onTap: () {
                              Navigator.pushReplacement(
                                  context,
                                  MaterialPageRoute(
                                      builder: (context) => LoginScreen()));
                            },
                            child: Text(
                              "Login",
                              style: TextStyle(
                                  color: Colors.deepPurple,
                                  fontWeight: FontWeight.bold,
                                  fontSize: 15),
                            ),
                          )
                        ],
                      ),
                      SizedBox(height: 20,),
                    ],
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }

  void signUp(
    String email,
    String password,
    String phone,
    String college_number,
    String college,
    String full_name,
    String subscriber_type,
  ) async {
    // showDialog(
    //   context: context,
    //   builder: (context) {
    //     return Center(
    //         child: CircularProgressIndicator(
    //       color: Colors.deepPurple,
    //     ));
    //   },
    // );

  }
}
