import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:mo7/business_logic/cubit/cubit/authcubit_cubit.dart';
import 'package:mo7/presentation/screens/feadback_screen.dart';
import 'package:mo7/presentation/screens/login_screen.dart';
import 'package:mo7/presentation/screens/nav_bar_driver/nav_bar_d.dart';
import 'package:mo7/presentation/screens/nav_bar_student/Home_screen.dart';
import 'package:mo7/presentation/screens/nav_bar_student/nav_bar_s.dart';
import 'package:mo7/presentation/screens/show_trip.dart';
import 'package:mo7/presentation/screens/welcome_screen.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  MyApp({Key? key}) : super(key: key);
  final AuthcubitCubit _authcubitCubit = AuthcubitCubit();
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
      return MultiBlocProvider(
      providers: [
        BlocProvider<AuthcubitCubit>(
          create: (context) => AuthcubitCubit(),
        ),
        BlocProvider<BottomNavCubit>(
          create: (context) => BottomNavCubit(),
        ),
        BlocProvider<BottomNavDriverCubit>(
          create: (context) => BottomNavDriverCubit(),
        ),

        // Add more BlocProviders if you have additional cubits or blocs
      ],
      child: MaterialApp(
        routes: {
          '/login': (context) => const LoginScreen(),
          '/student_page': (context) => const HomeScreen(),
          '/nav_bar_st': (context) =>  NavBar(),
          '/nav_bar_d': (context) =>  NavBarDriver(),
          '/nav_feadback': (context) =>  FeedbackScreen(),
          '/trips': (context) =>  TripsScreen(),
          // '/homeStudent': (context) => const HomeScreenStudent(),
          // '/homeDriver': (context) => const HomeScreenDriver(),
        },
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
          useMaterial3: true,
        ),
        home: const WelcomeScreen(),
      ),
    );
  }
    // return BlocProvider.value(
    //   value: _authcubitCubit,
    //   child: MaterialApp(
    //     routes: {
    //       '/login': (context) => const LoginScreen(),
    //       // '/homeStudent': (context) => const HomeScreenStudent(),
    //       // '/homeDriver': (context) => const HomeScreenDriver(),
    //     },
    //     debugShowCheckedModeBanner: false,
    //     theme: ThemeData(
    //       colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
    //       useMaterial3: true,
    //     ),
    //     home: const WelcomeScreen(),
    //   ),
    // );
  }

