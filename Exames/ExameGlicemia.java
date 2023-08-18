package main.java.Exames;

import java.util.Scanner;

public class ExameGlicemia extends Exame {
    private double quantidadeGlicose;

    public ExameGlicemia(String nome, String tipoSanguineo, int anoNascimento) {
        super(nome, tipoSanguineo, anoNascimento);
    }

    @Override
    public void calcularResultado() {
        if (quantidadeGlicose < 100) {
            resultado = "Normoglicemia";
        } else if (quantidadeGlicose < 126) {
            resultado = "Pré-diabetes";
        } else {
            resultado = "Diabetes estabelecido";
        }
    }

    @Override
    public void mostrarResultado() {
        System.out.println("Resultado do Exame de Glicemia:");
        super.mostrarResultado();
        System.out.println();
    }

    @Override
    public void cadastrarExame(Scanner scanner) {
        System.out.print("Informe a quantidade de glicose em mg/dL: ");
        quantidadeGlicose = scanner.nextDouble();
        calcularResultado();
    }
}

