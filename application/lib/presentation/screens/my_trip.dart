

import 'dart:convert';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:mo7/presentation/screens/nav_bar_student/Qr_screen.dart';
import 'package:qr_flutter/qr_flutter.dart';

import '../../business_logic/cubit/cubit/authcubit_cubit.dart';
import '../../data/model/sendAuth.dart';

class MyTrip extends StatelessWidget {
  Map<String, dynamic> js = {};
  Map<String, String> get headers => {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Length": jsonEncode(js).length.toString(),
    //"Authorization": "Bearer $_token",
  };


  Future<List<TripsS>> fetchMyTrips(String id) async {
    js = SendId(id: id).toJson();
    final body = jsonEncode(js);

    final response = await http.post(Uri.parse('http://192.168.139.25:8000/api/showsubscribertrip'),headers: headers, body: body,
      encoding: Encoding.getByName("utf-8"),);
    if (response.statusCode == 200) {
      final List<dynamic> data = jsonDecode(response.body)['trips'];
      print(response.body);
      return data.map((tripJson) => TripsS.fromJson(tripJson)).toList();
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
          title: Text('my Trips'),
        ),
        body: FutureBuilder<List<TripsS>>(
          future: fetchMyTrips(id!),
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
                  final trips = snapshot.data![index];
                  return ListTile(
                    title: Text('Trip ${trips.subscriberId}'),
                    subtitle: Text('${trips.tripId?.tripDay} to ${trips.tripId?.tripDay}, ${trips.tripId?.tripDay}}'),

                    onTap: (){
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => QRScreen(qrCodeData: trips.qrCode.toString()),
                        ),
                      );
                      QrImageView(
                        data: '${trips.qrCode}',
                        version: QrVersions.auto,
                        size: 270.0,
                      );


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