

import 'dart:convert';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';

import '../../business_logic/cubit/cubit/authcubit_cubit.dart';
import '../../data/model/sendAuth.dart';

class TripsScreen extends StatelessWidget {


  Future<List<Trip>> fetchTrips() async {
    Map<String, String> headers = {
      'Postman-Token':'<calculated when request is sent>',
      'Content-Type':'application/json',
      'Content-Length':'<calculated when request is sent>',
      'Host':'<calculated when request is sent>',
      'User-Agent':'PostmanRuntime/7.36.3',
      'Accept':'*/*',
      'Accept-Encoding':'gzip, deflate, br',
      'Connection':'keep-alive',
    };

    final response = await http.get(Uri.parse('http://192.168.139.25:8000/api/ShowTrip'));
    if (response.statusCode == 200) {
      final List<dynamic> data = jsonDecode(response.body)['trips'];
      print(response.body);
      return data.map((tripJson) => Trip.fromJson(tripJson)).toList();
    } else {
      throw Exception('Failed to load trips');
    }
  }
  Future<void> postData(String subscriberId, String tripId) async {
    // Define the URL where you want to send the POST request
    String url = '';

    // Create a Map object to hold your parameters

    try {
      // Send POST request
      var response = await http.post(
        Uri.parse('http://192.168.139.25:8000/api/choosetrip?subscriber_id=$subscriberId&trip_id=$tripId'),

      );

      // Check if the request was successful (status code 200)
      if (response.statusCode == 200) {



        print('Data posted successfully!');
      } else {
        print('Failed to post data: ${response.statusCode}');
      }
    } catch (e) {
      print('Error posting data: $e');
    }
  }
  @override
  Widget build(BuildContext context) {

    return BlocBuilder<AuthcubitCubit, AuthcubitState>(
      builder: (context, state) {
        if (state is AuthcubitLoged) {
          String? sudid = state.authResponse.subscriber?.subscriberId.toString();

          // String? name ='';
          // String? email = '';
          // String? phone = '';
          return _buildProfileScreen(sudid);
        } else {
          return _buildLoadingScreen();
        }
      },
    );
  }

  Widget _buildProfileScreen(String? id) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: Text('Choose Trips'),
        ),
        body: FutureBuilder<List<Trip>>(
          future: fetchTrips(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return Center(
                child: CircularProgressIndicator(),
              );
            } else if (snapshot.hasError) {
              return Center(
                child: Text('Error: ${snapshot.error}'),
              );
            } else {
              return ListView.builder(
                itemCount: snapshot.data!.length,
                itemBuilder: (context, index) {
                  final trip = snapshot.data![index];
                  return ListTile(
                    title: Text('Trip ${trip.tripNumber}'),
                    subtitle: Text('${trip.startPoint} to ${trip.endPoint}, ${trip.tripDay}, ${trip.startTime}'),
                    trailing: Text('Stops : ${trip.stops}'),
                    onTap: (){
                      postData(id ?? '1',trip.tripId.toString());


                    },
                  );

                },
              );
            }
          },
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