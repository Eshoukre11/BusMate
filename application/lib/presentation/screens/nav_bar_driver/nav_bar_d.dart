import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:mo7/presentation/screens/nav_bar_driver/homeDr.dart';
import 'package:mo7/presentation/screens/nav_bar_driver/profile_driver.dart';
import 'package:mo7/presentation/screens/nav_bar_student/profile_screen.dart';
import 'package:mo7/presentation/screens/nav_bar_student/trck_screen.dart';
import '../../../business_logic/cubit/cubit/authcubit_cubit.dart';
import '../nav_bar_student/Home_screen.dart';
import '../nav_bar_student/Qr_screen.dart';
import '../qr.dart';




class NavBarDriver extends StatefulWidget {
  @override
  _NavBarDriverState createState() => _NavBarDriverState();
}

class _NavBarDriverState extends State<NavBarDriver> {
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
  /// Create a list of pages to make the code shorter and better readability
  ///
  final _pageNavigation = [

    HomeScreenD(),
    QRScreenD(),
    TrackScreen(),
    ProfileScreenDriver(),
  ];

  @override
  Widget build(BuildContext context) {
    return BlocBuilder<BottomNavCubit, int>(
      builder: (context, state) {
        return Scaffold(
          body: _buildBody(state),
          bottomNavigationBar: _buildBottomNav(),
        );
      },
    );
  }

  Widget _buildBody(int index) {
    /// Check if index is in range
    /// else return Not Found widget
    ///

    return _pageNavigation.elementAt(index);
  }

  Widget _buildBottomNav() {
    return BottomNavigationBar(
      currentIndex: context.read<BottomNavCubit>().state,
      type: BottomNavigationBarType.fixed,
      selectedItemColor: Colors.deepPurple,
      onTap: _getChangeBottomNav,
      items: [
        BottomNavigationBarItem(icon: Icon(Icons.home), label: "Home"),
        BottomNavigationBarItem(icon: Icon(Icons.qr_code), label: "Scan Qr"),
        BottomNavigationBarItem(
            icon: Icon(Icons.linear_scale), label: 'Tracking'),
        BottomNavigationBarItem(icon: Icon(Icons.person), label: "Profile"),
      ],
    );
  }

  void _getChangeBottomNav(int index) {
    context.read<BottomNavCubit>().updateIndex(index);
  }
}
