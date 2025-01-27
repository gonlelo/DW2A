package Ficheros;

import java.io.BufferedReader;
import java.io.InputStreamReader;

public class LeerScannerLineaLinea {
    public static void main(String[] args) throws Exception {
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
        System.out.print("Ingresa tu nombre: ");
        String nombre = reader.readLine(); // Lee una línea completa
        System.out.println("Hola, " + nombre);
        reader.close(); // Importante cerrar el BufferedReader
    }
}