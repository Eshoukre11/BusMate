import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:google_nav_bar/google_nav_bar.dart';
import 'package:line_icons/line_icons.dart';
import '../feadback_screen.dart';
import '../show_trip.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  Future<bool?> _onBackPressed() async {
    return showDialog(
        context: context,
        builder: (BuildContext context) {
          return AlertDialog(
            title: Text('Do you want to exit?'),
            actions: <Widget>[
              TextButton(
                child: Text('No'),
                onPressed: () {
                  Navigator.of(context).pop(false);
                },
              ),
              TextButton(
                child: Text('Yes'),
                onPressed: () {
                  Navigator.of(context).pop(true);
                  SystemNavigator.pop();
                },
              ),
            ],
          );
        });
  }

  final items = ['Choosing Trips', 'Make orde', 'Change Line', 'Feadback'];

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
        onWillPop: () async {
          bool? result = await _onBackPressed();
          if (result == null) {
            result = false;
          }
          return result;
        },
        child: Scaffold(
          body: Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage(
                    'assets/images/R (1).jpg'), // Change path to your image
                fit: BoxFit.cover,
              ),
            ),
            child: Column(
              children: [
                SizedBox(
                  height: 50,
                  width: 0,
                ),
                // Carousel

                // ClipRRect(
                //   borderRadius: BorderRadius.circular(20),
                //   child: CarouselSlider(
                //     items: [
                //       Image.asset('assets/images/OIP.jpg'),
                //       Image.asset('assets/images/OIP (1).jpg'),
                //       Image.asset('assets/images/R (1).jpg'),
                //     ],
                //     options: CarouselOptions(
                //       height: 200,
                //       autoPlay: true,
                //       enlargeCenterPage: true,
                //     ),
                //   ),
                // ),

                // QR code button

                // Grid view
                // Flexible(
                //   child: GridView.count(
                //     crossAxisCount: 1,
                //     children: List.generate(
                //       items.length,
                //       (index) => GestureDetector(
                //           onTap: () {
                //             // Handle navigation to FeedbackScreen
                //             if (items[index] == 'Choosing Trips') {
                //               Navigator.push(
                //                 context,
                //                 MaterialPageRoute(
                //                   builder: (context) => TripsScreen(),
                //                 ),
                //               );
                //             }
                //             // else if (items[index] == 'Choosing Trips') {
                //             //   Navigator.push(
                //             //     context,
                //             //     MaterialPageRoute(
                //             //       builder: (context) => TripsScreen(),
                //             //     ),
                //             //   );
                //             // }
                //           },
                //           child: Container(
                //             decoration: BoxDecoration(
                //               borderRadius: BorderRadius.circular(10),
                //               gradient: LinearGradient(
                //                 colors: [Colors.black, Colors.deepPurpleAccent],
                //                 begin: Alignment.topLeft,
                //                 end: Alignment.bottomRight,
                //               ),
                //             ),
                //             margin: EdgeInsets.all(10),
                //             child: Center(
                //               child: Text(
                //                 items[index],
                //                 style: TextStyle(
                //                   color: Colors.white,
                //                   fontSize: 20,
                //                 ),
                //               ),
                //             ),
                //           )),
                //     ),
                //   ),
                // ),
                SizedBox(height: 30),
                Material(
                  elevation: 5,
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.deepPurple,
                  child: MaterialButton(
                      padding: EdgeInsets.fromLTRB(20, 15, 20, 15),
                      minWidth: MediaQuery.of(context).size.width,
                      onPressed: () {
                        WidgetsBinding.instance.addPostFrameCallback((_) {
                          Navigator.pushReplacement(context, MaterialPageRoute(builder: (_) => TripsScreen()));
                        });
                      },
                      child: Text(
                        "Choosing Trips",
                        textAlign: TextAlign.center,
                        style: TextStyle(
                            fontSize: 20,
                            color: Colors.white,
                            fontWeight: FontWeight.bold),
                      )),
                ),
                SizedBox(height: 15),
                Material(
                  elevation: 5,
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.deepPurple,
                  child: MaterialButton(
                      padding: EdgeInsets.fromLTRB(20, 15, 20, 15),
                      minWidth: MediaQuery.of(context).size.width,
                      onPressed: () {},
                      child: Text(
                        "Choosing Trips",
                        textAlign: TextAlign.center,
                        style: TextStyle(
                            fontSize: 20,
                            color: Colors.white,
                            fontWeight: FontWeight.bold),
                      )),
                ),
                SizedBox(height: 15),
                Material(
                  elevation: 5,
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.deepPurple,
                  child: MaterialButton(
                      padding: EdgeInsets.fromLTRB(20, 15, 20, 15),
                      minWidth: MediaQuery.of(context).size.width,
                      onPressed: () {},
                      child: Text(
                        "Choosing Trips",
                        textAlign: TextAlign.center,
                        style: TextStyle(
                            fontSize: 20,
                            color: Colors.white,
                            fontWeight: FontWeight.bold),
                      )),
                ),
                SizedBox(height: 15),
                Material(
                  elevation: 5,
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.deepPurple,
                  child: MaterialButton(
                      padding: EdgeInsets.fromLTRB(20, 15, 20, 15),
                      minWidth: MediaQuery.of(context).size.width,
                      onPressed: () {},
                      child: Text(
                        "Choosing Trips",
                        textAlign: TextAlign.center,
                        style: TextStyle(
                            fontSize: 20,
                            color: Colors.white,
                            fontWeight: FontWeight.bold),
                      )),
                ),
                SizedBox(height: 15),



              ],
            ),
          ),
          // Bottom bar
        ));
  }
}
