import 'package:flutter/material.dart';


class TrackScreen extends StatefulWidget {
  @override
  State<TrackScreen> createState() => _TrackScreenState();
}

class _TrackScreenState extends State<TrackScreen> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Bus Track'),
        ),
        body: TrackMap(),
      ),
    );
  }
}

class TrackMap extends StatelessWidget {
  final List<Stop> stops = [
    Stop('Stop 1', passed: true),
    Stop('Stop 2', passed: true),
    Stop('Stop 3', passed: false),
    Stop('Stop 4', passed: false),
    Stop('Stop 5', passed: false),
    Stop('Stop 6', passed: false),
    Stop('Stop 7', passed: false),
  ];

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      itemExtent: 100,
      itemCount: stops.length,
      itemBuilder: (context, index) {
        final stop = stops[index];
        return Container(
          color: stop.passed ? Colors.green : (stop.stay ? Colors.yellow : Colors.red),
          padding: EdgeInsets.all(16),
          child: Center(
            child: Row(
              children: [
                SizedBox(width: 100,),
                Icon(Icons.location_on, color: Colors.white),
                SizedBox(width: 16),
                Text(stop.name, style: TextStyle(color: Colors.white)),
              ],
            ),
          ),
        );
      },
    );
  }
}

class Stop {
  final String name;
  final bool passed;
  final bool stay;

  Stop(this.name, {this.passed = false, this.stay = false});
}
