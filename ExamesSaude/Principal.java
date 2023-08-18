package main.java.Exames;

import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        ExameGlicemia exameGlicemia = new ExameGlicemia("João", "A+", 1985);
        exameGlicemia.cadastrarExame(scanner);
        exameGlicemia.mostrarResultado();

        ExameColesterol exameColesterol = new ExameColesterol("Maria", "O+", 2000);
        exameColesterol.cadastrarExame(scanner);
        exameColesterol.mostrarResultado();

        ExameTriglicerideos exameTriglicerideos = new ExameTriglicerideos("Carlos", "AB-", 2010);
        exameTriglicerideos.cadastrarExame(scanner);
        exameTriglicerideos.mostrarResultado();

        scanner.close();
    }
}
