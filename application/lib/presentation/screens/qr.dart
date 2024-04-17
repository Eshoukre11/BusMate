import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:qr_flutter/qr_flutter.dart';

class QRScreenD extends StatefulWidget {
  @override
  _QRScreenDState createState() => _QRScreenDState();
}

class _QRScreenDState extends State<QRScreenD> {
  String qrData = '';

  @override
  void initState() {
    super.initState();
     // Fetch data from Laravel API when the screen is initialized.
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(

      body: Container(
        decoration: BoxDecoration(
          borderRadius: BorderRadius.circular(10),
          gradient: LinearGradient(
            colors: [Colors.white, Colors.deepPurple],
            begin: Alignment.topLeft,
            end: Alignment.bottomRight,
          ),
        ),
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              QrImageView(
                data: '9ytuyhdgyfukgkbz',
                version: QrVersions.auto,
                size: 270.0,
              ),
              SizedBox(height: 20),
              Text('Scan this QR code'),
            ],
          ),
        ),
      ),

    );
  }
}
