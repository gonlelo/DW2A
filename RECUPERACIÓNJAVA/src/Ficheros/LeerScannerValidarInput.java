package Ficheros;

import java.util.Scanner;

public class LeerScannerValidarInput {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Introduce un número decimal:");

        if (scanner.hasNextDouble()) {
            double numero = scanner.nextDouble();
            System.out.println("Has introducido el número: " + numero);
        } else {
            System.out.println("No has introducido un número válido.");
        }

        scanner.close();
    }
}