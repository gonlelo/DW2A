package RegEx;

import java.util.regex.*;

public class BuscarNumTel {
    public static void main(String[] args) {
        String texto = "Hola, mi número es 123-456-7890.";
        String regex = "\\d{3}-\\d{3}-\\d{4}";

        Pattern pattern = Pattern.compile(regex);
        Matcher matcher = pattern.matcher(texto);

        if (matcher.find()) {
            System.out.println("Número encontrado: " + matcher.group());
        }
    }
}