package Ficheros;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class LeerScannerCharChar {
	public static void main(String[] args) throws IOException {
	BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
	int letra;
	while ((letra = reader.read()) != -1) {
		if ((char) letra != 'v') {
			System.out.print((char) letra);
		}
	}	
	}
}