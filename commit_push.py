"""Stage project changes, create a Git commit, and push it to GitHub."""

from datetime import datetime
from pathlib import Path
import subprocess
import sys


PROJECT_DIR = Path(__file__).resolve().parent


def git(*args: str, check: bool = True) -> subprocess.CompletedProcess[str]:
    return subprocess.run(
        ["git", *args],
        cwd=PROJECT_DIR,
        text=True,
        check=check,
    )


def main() -> int:
    if git("rev-parse", "--is-inside-work-tree", check=False).returncode != 0:
        print("Hata: Bu klasör bir Git deposu değil.", file=sys.stderr)
        return 1

    branch = subprocess.run(
        ["git", "branch", "--show-current"],
        cwd=PROJECT_DIR,
        text=True,
        capture_output=True,
        check=True,
    ).stdout.strip()
    if not branch:
        print("Hata: Etkin bir Git dalı bulunamadı.", file=sys.stderr)
        return 1

    remote = subprocess.run(
        ["git", "remote", "get-url", "origin"],
        cwd=PROJECT_DIR,
        text=True,
        capture_output=True,
        check=False,
    )
    if remote.returncode != 0:
        print("Hata: 'origin' uzak deposu tanımlı değil.", file=sys.stderr)
        return 1

    git("add", "-A")
    has_changes = git("diff", "--cached", "--quiet", check=False).returncode != 0
    if not has_changes:
        print("Commit edilecek değişiklik yok.")
        return 0

    default_message = f"Güncellemeler {datetime.now().strftime('%Y-%m-%d %H:%M')}"
    try:
        message = input(f"Commit mesajı [{default_message}]: ").strip() or default_message
    except EOFError:
        message = default_message

    git("commit", "-m", message)
    git("push", "-u", "origin", branch)
    print(f"Değişiklikler '{branch}' dalına gönderildi.")
    return 0


if __name__ == "__main__":
    try:
        raise SystemExit(main())
    except subprocess.CalledProcessError as error:
        print(f"Git komutu başarısız oldu (çıkış kodu: {error.returncode}).", file=sys.stderr)
        raise SystemExit(error.returncode)
