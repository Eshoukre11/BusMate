import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';

import '../../../business_logic/cubit/cubit/authcubit_cubit.dart';

class ProfileScreenDriver extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return BlocBuilder<AuthcubitCubit, AuthcubitState>(
      builder: (context, state) {
        if (state is AuthcubitLogedD)
        {
          String? name = state.auth.subscriber?.driverName.toString();
          String? email = state.auth.subscriber?.email.toString();
          String? phone = state.auth.subscriber?.driverNumber.toString();

          // String? name ='';
          // String? email = '';
          // String? phone = '';
          return _buildProfileScreenDriver(name,email,phone);
        } else {
          return _buildLoadingScreen();
        }
      },
    );
  }

  Widget _buildProfileScreenDriver(String? name,String? email,String? phone) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        body: Container(
          decoration: BoxDecoration(
            image: DecorationImage(
              image: AssetImage('assets/images/R (1).jpg'), // Change path to your image
              fit: BoxFit.cover,
            ),
          ),
          child: Padding(
            padding: const EdgeInsets.all(20.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                SizedBox(height: 100,),
                CircleAvatar(
                  radius: 50,
                  backgroundImage: AssetImage('assets/profile_image.jpg'),
                ),
                SizedBox(height: 20),
                Text(
                  name ?? '',
                  style: TextStyle(
                    color: Colors.black,
                    fontSize: 24,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                SizedBox(height: 10),
                Text(
                  'University of XYZ',
                  style: TextStyle(
                    color: Colors.black,
                    fontSize: 18,
                  ),
                ),
                SizedBox(height: 20),
                ListTile(
                  leading: Icon(Icons.phone,color: Colors.black,),
                  title: Text(phone ?? '',style: TextStyle(color: Colors.black,),),
                ),
                ListTile(
                  leading: Icon(Icons.email,color: Colors.black,),
                  title: Text(email ?? '',style: TextStyle(color: Colors.black,)),
                ),
                ListTile(
                  leading: Icon(Icons.school,color: Colors.black,),
                  title: Text('Student ID: 987654',style: TextStyle(color: Colors.black,)),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }

  Widget _buildLoadingScreen() {
    return Center(
      child: CircularProgressIndicator(),
    );
  }
}
